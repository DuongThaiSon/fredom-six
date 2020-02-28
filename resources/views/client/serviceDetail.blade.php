@extends('client.layouts.main', 'title'=> ['Service Detail'])
@include('client.layouts.header')
@section('content')
    <section id="breadcrumb">
        <div class="container">
            <p>
                <a href="Home.html" class="text-capitalize">home</a> &nbsp > &nbsp
                <a href="Service.html" class="text-capitalize">our services</a> &nbsp > &nbsp
                <a href="Service Detail.html" class="text-capitalize font-weight-bold">logo & branding design</a>
            </p>
        </div>
    </section>

    <section id="services-detail">
        <div class="container">
            <h1 class="text-capitalize">logo & branding design</h1>
            <p class="m-0">We work closely with our clients to research, build on expertise and experience to provide
                solutions to
                increase potential customers, successful sales rates based on technology and useful tools that the
                Internet bring. Especially we are always aiming at the market share of mobile phones which is now the
                market leader in the number of devices used in the world.
            </p>
            <div class="step-process">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="step-wrap">
                            <div class="step-inner">
                                <span style="color: #fdb813;">1</span>
                            </div>
                        </div>
                        <p class="step-title">Fill your information</p>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="step-dots">
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                        </div>
                        <div class="step-caret">
                            <i class="fas fa-caret-right js-step_bg"></i>
                        </div>
                        <div class="step-caret step-caret_mb d-none">
                            <i class="fas fa-caret-down js-step_bg"></i>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="step-wrap">
                            <div class="step-inner">
                                <span class="step-number-2">2</span>
                            </div>
                        </div>
                        <p class="step-title">Fill your requirement</p>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="step-dots-2">
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                            <div class="js-step_bg"></div>
                        </div>
                        <div class="step-caret">
                            <i class="fas fa-caret-right js-step_bg-2"></i>
                        </div>
                        <div class="step-caret step-caret_mb d-none">
                            <i class="fas fa-caret-down js-step_bg-2"></i>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="step-wrap">
                            <div class="step-inner">
                                <span class="step-number-3">3</span>
                            </div>
                        </div>
                        <p class="step-title">Finish</p>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="fill fill-infor">
                    <div class="fill-header">
                        <h1>Fill your information</h1>
                        <button class="btn-carret" type="button" data-toggle="collapse" data-target="#fill-infor">
                            <i class="fas fa-caret-down"></i>
                        </button>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="row collapse show" id="fill-infor">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">Full name</label>
                                <input type="text" name="input-info" class="form-control input-fill-info">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="number" name="input-info" class="form-control input-fill-info">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="input-info" class="form-control input-fill-info">
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="input-info" class="form-control input-fill-info">
                            </div>
                            <div class="form-group">
                                <label for="">Company Name</label>
                                <input type="text" name="input-info" class="form-control input-fill-info">
                            </div>
                            <div class="form-group">
                                <label for="">Note (if have)</label>
                                <input type="text" name="input-info" class="form-control input-fill-info">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fill fill-require">
                    <div class="fill-header">
                        <h1>Fill your requirement</h1>
                        <button class="btn-carret" type="button" data-toggle="collapse" data-target="#fill-require">
                            <i class="fas fa-caret-down"></i>
                        </button>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="row collapse show" id="fill-require">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">What is your business name?</label>
                                <input type="text" name="input-require" class="form-control input-fill-require">
                            </div>
                            <div class="form-group">
                                <label for="">What color do you like?</label>
                                <input type="text" name="input-require" class="form-control input-fill-require">
                            </div>
                            <div class="form-group">
                                <label for="">Describe your business</label>
                                <textarea type="email" name="input-require"
                                    class="form-control input-fill-require"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">What is your business slogan?</label>
                                <input type="text" name="input-require" class="form-control input-fill-require">
                            </div>
                            <div class="form-group">
                                <label for="">What is your industry?</label>
                                <input type="text" name="input-require" class="form-control input-fill-require">
                            </div>
                            <div class="form-group">
                                <label for="">Describe what you want (keywords, fengshui,...)</label>
                                <textarea type="email" name="input-require"
                                    class="form-control input-fill-require"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape-style" id="shape-style">
                    <p>What is your shape style?</p>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="shape-pic">
                                <img src="{{ asset('assets/client')}}/images/logo-monar.png" alt="">
                            </div>
                            <input type="radio" id="pic1" name="shape">
                            <label for="pic1"></label>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shape-pic">
                                <img src="{{ asset('assets/client')}}/images/logo-69.png" alt="">
                            </div>
                            <input type="radio" id="pic2" name="shape">
                            <label for="pic2"></label>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shape-pic">
                                <img src="{{ asset('assets/client')}}/images/logo-elephent.png" alt="">
                            </div>
                            <input type="radio" id="pic3" name="shape">
                            <label for="pic3"></label>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shape-pic">
                                <img src="{{ asset('assets/client')}}/images/logo-jamon.png" alt="">
                            </div>
                            <input type="radio" id="pic4" name="shape">
                            <label for="pic4"></label>
                        </div>
                    </div>
                </div>
                <div class="shape-style">
                    <p>What is your logo's color style?</p>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="shape-pic">
                                <img src="{{ asset('assets/client')}}/images/logo-69-red.png" alt="">
                            </div>
                            <input type="radio" id="pic5" name="color">
                            <label for="pic5"></label>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shape-pic">
                                <img src="{{ asset('assets/client')}}/images/logo-north.png" alt="">
                            </div>
                            <input type="radio" id="pic6" name="color">
                            <label for="pic6"></label>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shape-pic">
                                <img src="{{ asset('assets/client')}}/images/logo-join.png" alt="">
                            </div>
                            <input type="radio" id="pic7" name="color">
                            <label for="pic7"></label>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shape-pic">
                                <img src="{{ asset('assets/client')}}/images/logo-monkey.png" alt="">
                            </div>
                            <input type="radio" id="pic8" name="color">
                            <label for="pic8"></label>
                        </div>
                    </div>
                </div>
                <div class="logo-style">
                    <p class="m-0">What is your logo style?</p>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="style-range">
                                <label for="" class="float-left">Classic</label>
                                <label for="" class="float-right">Modern</label>
                                <div class="clear-fix"></div>
                                <input type="range" min="1" max="100" value="50" unit="%" class="slider-range" id="Range1">
                                <output for="Range1" id="volume1" class="volume">50%</output>
                            </div>
                            <div class="style-range">
                                <label for="" class="float-left">Mature</label>
                                <label for="" class="float-right">Youthfull</label>
                                <div class="clear-fix"></div>
                                <input type="range" min="1" max="100" value="50" class="slider-range" id="Range2">
                                <output for="Range2" id="volume2" class="volume">50%</output>
                            </div>
                            <div class="style-range">
                                <label for="" class="float-left">Feminine</label>
                                <label for="" class="float-right">Masculine</label>
                                <div class="clear-fix"></div>
                                <input type="range" min="1" max="100" value="50" class="slider-range" id="Range3">
                                <output for="Range3" id="volume3" class="volume">50%</output>
                            </div>
                            <div class="style-range">
                                <label for="" class="float-left">Playful</label>
                                <label for="" class="float-right">Sophisticated</label>
                                <div class="clear-fix"></div>
                                <input type="range" min="1" max="100" value="50" class="slider-range" id="Range4">
                                <output for="Range4" id="volume4" class="volume">50%</output>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="style-range">
                                <label for="" class="float-left">Economical</label>
                                <label for="" class="float-right">Luxurious</label>
                                <div class="clear-fix"></div>
                                <input type="range" min="1" max="100" value="50" class="slider-range" id="Range5">
                                <output for="Range5" id="volume5" class="volume">50%</output>
                            </div>
                            <div class="style-range">
                                <label for="" class="float-left">Geometric</label>
                                <label for="" class="float-right">Organic</label>
                                <div class="clear-fix"></div>
                                <input type="range" min="1" max="100" value="50" class="slider-range" id="Range6">
                                <output for="Range6" id="volume6" class="volume">50%</output>
                            </div>
                            <div class="style-range">
                                <label for="" class="float-left">Abstract</label>
                                <label for="" class="float-right">Literal</label>
                                <div class="clear-fix"></div>
                                <input type="range" min="1" max="100" value="50" class="slider-range" id="Range7">
                                <output for="Range7" id="volume7" class="volume">50%</output>
                            </div>
                            <div class="style-range">
                                <label for="" class="float-left">Abstract</label>
                                <label for="" class="float-right">Literal</label>
                                <div class="clear-fix"></div>
                                <input type="range" min="1" max="100" value="50" class="slider-range" id="Range8">
                                <output for="Range8" id="volume8" class="volume">50%</output>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-finish">Finish</button>
            </form>
        </div>
        <div class="thanks">
            <div class="col-lg-6 mx-auto">
                <h1 class="text-center">We will contact to you as soon as possible. Thank you!</h1>
            </div>
            <div class="load-icon">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </section>
@endsection