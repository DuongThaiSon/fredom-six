<?php

namespace App\Services\Repositories;
use Illuminate\Database\Query\JoinClause;

use Waavi\Translation\Repositories\TranslationRepository as WaaviTranslationRepository;

class TranslationRepository extends WaaviTranslationRepository
{
    public function getListTranslation($locale = null)
    {
        if (!$locale) $locale = $this->defaultLocale;
        $table = $this->model->getTable();
        $selectColumn = [
            "$table.text as source_text",
            "e.text as target_text",
            "e.id as id",
            "$table.namespace",
            "$table.group",
            "$table.item"
        ];
        return $this->database->table("$table as $table")
            ->select($selectColumn)
            ->leftJoin("$table as e", function (JoinClause $query) use ($table, $locale) {
                $query->on('e.namespace', '=', "$table.namespace")
                    ->on('e.group', '=', "$table.group")
                    ->on('e.item', '=', "$table.item")
                    ->where('e.locale', '=', $locale);
            })
            ->where("$table.locale", $this->defaultLocale)
            ->get();
    }
}
