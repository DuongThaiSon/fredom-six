<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use League\Flysystem\Adapter\Local;
use Log;
use Storage;

class BackupController extends Controller
{
    const LIST_BACKUP_OPTION = [
        'only_db' => '--only-db',
        'only_files' => '--only-files',
        'both' => ''
    ];

    const ALLOW_NOTIFICATION = [
        '0' => '--disable-notifications',
        '1' => ''
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!count(config('backup.backup.destination.disks'))) {
            dd('Chưa config ổ đĩa lưu backup');
        }

        $backups = $this->collectBackupFiles();
        $backups = collect($backups)->paginate(15);
        return view('admin.backups.index', compact('backups'));
    }

    /**
     * Collect backup file data
     *
     * @return array
     */
    private function collectBackupFiles()
    {
        $backups = [];
        foreach (config('backup.backup.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getDriver()->getAdapter();
            $files = $disk->allFiles();
            // make an array of backup files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                    $backups[] = [
                        'file_path'     => $f,
                        'file_name'     => str_replace('backups/', '', $f),
                        'file_size'     => $disk->size($f),
                        'last_modified' => $disk->lastModified($f),
                        'disk'          => $disk_name,
                        'can_download'      => ($adapter instanceof Local) ? true : false,
                        ];
                }
            }
        }
        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);
        return $backups;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = 'success';
        $options = json_decode($request->options);
        $backupCommend = 'backup:run';
        $backupCommend .= ' ' . self::LIST_BACKUP_OPTION[$options[0]] . ' ' . self::ALLOW_NOTIFICATION[$options[1]];
        try {
            ini_set('max_execution_time', 600);
            Log::info('Leotive -- Called backup:run from admin interface');
            Artisan::call($backupCommend);
            $output = Artisan::output();
            if (strpos($output, 'Backup failed because')) {
                preg_match('/Backup failed because(.*?)$/ms', $output, $match);
                $message = "Leotive -- backup process failed because ";
                $message .= isset($match[1]) ? $match[1] : '';
                Log::error($message.PHP_EOL.$output);
            } else {
                Log::info("Leotive -- backup process has started");
            }
        } catch (Exception $e) {
            Log::error($e);
            return response()->json($e->getMessage(), 500);
        }

        $backups = $this->collectBackupFiles();
        $backups = collect($backups)->paginate(15);
        return view('admin.backups.listBackup', compact('backups'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Downloads a backup zip file.
     */
    public function download(Request $request)
    {
        $disk = Storage::disk($request->input('disk'));
        $file_name = urldecode($request->input('file_name'));
        $adapter = $disk->getDriver()->getAdapter();
        if ($adapter instanceof Local) {
            $storage_path = $disk->getDriver()->getAdapter()->getPathPrefix();
            if ($disk->exists($file_name)) {
                return response()->download($storage_path.$file_name);
            } else {
                abort(404, __('Tệp sao lưu không tồn tại'));
            }
        } else {
            abort(404, __('Chỉ hỗ trợ download đối với tệp tin lưu nội bộ'));
        }
    }
}
