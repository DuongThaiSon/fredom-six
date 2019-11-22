@extends('client.layouts.main', ['title' => __('Showroom')])
@section('content')
<!-- contact -->
<section id="contact">
    <div class="container">
        <div class="showrooms">
            <div class="row">
                <div class="line-bold col-lg-5 col-md-3 col-2"></div>
                <div class="col-lg-2 col-md-6 col-8 align-self-center font-weight-bold">
                    <p class="text-uppercase m-0 text-center" style="font-size: 24px;">
                        {{ $showroommb->first()->regions }}</p>
                </div>
                <div class="line-bold col-lg-5 col-md-3 col-2"></div>
            </div>
            <div class="row">
                <!-- showroom -->
                @foreach ($showroommb as $showmb)
                <div class="col-12 col-lg-4">
                    <div class="showroom">
                        <p class="showroom-title">{{ $showmb->name }}</p>
                        <div class="showroom-img">
                            <img src="{{ asset('/media/showroom') }}/{{ $showmb->avatar }}" alt="{{ $showmb->avatar }}">
                        </div>
                        <div class="showroom-detail">
                            <p class="showroom-detail-address"><i class="fas fa-map-marker-alt"></i>
                                {{ $showmb->address }}</p>
                            <p><i class="fas fa-phone-alt"></i> {{ $showmb->email }}</p>
                            <p><i class="fas fa-envelope"></i> {{ $showmb->phone }}</p>
                        </div>
                        <div class="group-button d-flex justify-content-end">
                            <a href="#" class="btn" data-toggle="modal" data-target="#formContact-north-{{ $loop->iteration }}">Liên hệ</a>
                            <a href="#" class="btn" data-toggle="modal"
                                data-target="#map-north-{{ $loop->iteration }}">Chỉ đường</a>
                        </div>
                    </div>
                </div>
                <!-- map modal -->
                <div class="modal fade" id="map-north-{{ $loop->iteration }}" style="top: 150px;">
                    <div class="modal-dialog">
                        <div class="modal-content" style="max-height:300px !important;">
                            {!! $showmb->map !!}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="showrooms">
            <div class="row">
                <div class="line-bold col-lg-5 col-md-3 col-2"></div>
                <div class="col-lg-2 col-md-6 col-8 align-self-center font-weight-bold">
                    <p class="text-uppercase m-0 text-center" style="font-size: 24px;">
                        {{ $showroommt->first()->regions??'' }}</p>
                </div>
                <div class="line-bold col-lg-5 col-md-3 col-2"></div>
            </div>
            <div class="row">
                <!-- showroom -->
                @foreach ($showroommt as $showmt)
                <div class="col-12 col-lg-4">
                    <div class="showroom">
                        <p class="showroom-title">{{ $showmt->name }}</p>
                        <div class="showroom-img">
                            <img src="{{ asset('/media/showroom') }}/{{ $showmt->avatar }}" alt="{{ $showmt->avatar }}">
                        </div>
                        <div class="showroom-detail">
                            <p class="showroom-detail-address"><i class="fas fa-map-marker-alt"></i>
                                {{ $showmt->address }}</p>
                            <p><i class="fas fa-phone-alt"></i> {{ $showmt->email }}</p>
                            <p><i class="fas fa-envelope"></i> {{ $showmt->phone }}</p>
                        </div>
                        <div class="group-button d-flex justify-content-end">
                            <a href="#" class="btn" data-toggle="modal" data-target="#formContact-central-{{ $loop->iteration }}">Liên hệ</a>
                            <a href="#" class="btn" data-toggle="modal"
                                data-target="#map-central-{{ $loop->iteration }}">Chỉ đường</a>
                        </div>
                    </div>
                </div>
                <!-- map modal -->
                <div class="modal fade" id="map-central-{{ $loop->iteration }}" style="top: 150px;">
                    <div class="modal-dialog">
                        <div class="modal-content" style="max-height:300px !important;">
                            {!! $showmt->map !!}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="showrooms">
            <div class="row">
                <div class="line-bold col-lg-5 col-md-3 col-2"></div>
                <div class="col-lg-2 col-md-6 col-8 align-self-center font-weight-bold">
                    <p class="text-uppercase m-0 text-center" style="font-size: 24px;">
                        {{ $showroommn->first()->regions??'' }}</p>
                </div>
                <div class="line-bold col-lg-5 col-md-3 col-2"></div>
            </div>
            <div class="row">
                <!-- showroom -->
                @foreach ($showroommn as $showmn)
                <div class="col-12 col-lg-4">
                    <div class="showroom">
                        <p class="showroom-title">{{ $showmn->name }}</p>
                        <div class="showroom-img">
                            <img src="{{ asset('/media/showroom') }}/{{ $showmn->avatar }}" alt="{{ $showmn->avatar }}">
                        </div>
                        <div class="showroom-detail">
                            <p class="showroom-detail-address"><i class="fas fa-map-marker-alt"></i>
                                {{ $showmn->address }}</p>
                            <p><i class="fas fa-phone-alt"></i> {{ $showmn->email }}</p>
                            <p><i class="fas fa-envelope"></i> {{ $showmn->phone }}</p>
                        </div>
                        <div class="group-button d-flex justify-content-end">
                            <a href="#" class="btn" data-toggle="modal" data-target="#formContact-south-{{ $loop->iteration }}">Liên hệ</a>
                            <a href="" class="btn" data-toggle="modal"
                                data-target="#map-south-{{  $loop->iteration  }}">Chỉ đường</a>
                        </div>
                    </div>
                </div>
                <!-- map modal -->
                <div class="modal fade" id="map-south-{{  $loop->iteration  }}" style="top: 150px;">
                    <div class="modal-dialog">
                        <div class="modal-content" style="max-height:300px !important;">
                            {!! $showmn->map !!}
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
    @foreach ($showroommb as $showmb)
    <div class="modal fade" id="formContact-north-{{ $loop->iteration }}">
        <div class="modal-dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="close-button" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="font-weight-bold">Moolez Việt Nam</p>
                        <p>Địa chỉ: {{ $showmb->address }}</p>
                        <p>Email : {{ $showmb->email }}</p>
                        <p>Điện thoại : {{ $showmb->phone }}</p>
                        <form action="{{ route('client.showrooms.contact') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Họ tên *</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại *</label>
                                <input name="phone" type="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Tin nhắn *</label>
                                <textarea class="form-control" required name="content" id=""></textarea>
                            </div>
                            <button type="submit" class="btn font-weight-bold">Gửi liên hệ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($showroommt as $showmt)
    <div class="modal fade" id="formContact-central-{{ $loop->iteration }}">
        <div class="modal-dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="close-button" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="font-weight-bold">Moolez Việt Nam</p>
                        <p>Địa chỉ: {{ $showmt->address }}</p>
                        <p>Email : {{ $showmt->email }}</p>
                        <p>Điện thoại : {{ $showmt->phone }}</p>
                        <form action="{{ route('client.showrooms.contact') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Họ tên *</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại *</label>
                                <input name="phone" type="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Tin nhắn *</label>
                                <textarea class="form-control" required name="content" id=""></textarea>
                            </div>
                            <button type="submit" class="btn font-weight-bold">Gửi liên hệ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($showroommn as $showmn)
    <div class="modal fade" id="formContact-south-{{ $loop->iteration }}">
        <div class="modal-dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="close-button" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="font-weight-bold">Moolez Việt Nam</p>
                        <p>Địa chỉ: {{ $showmn->address }}</p>
                        <p>Email : {{ $showmn->email }}</p>
                        <p>Điện thoại : {{ $showmn->phone }}</p>
                        <form action="{{ route('client.showrooms.contact') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Họ tên *</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại *</label>
                                <input name="phone" type="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Tin nhắn *</label>
                                <textarea class="form-control" required name="content" id=""></textarea>
                            </div>
                            <button type="submit" class="btn font-weight-bold">Gửi liên hệ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
@endsection
