@extends('backend.layouts.master')
@section('title')@endsection
<title>{{getSystemSetting('type_name')}} | Preloader settings</title>
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card m-2">
                <div class="card-header">
                    <h2 class="card-title">@translate(Preloader Settings)</h2>
                </div>
                <div class="card-body">

                    <form method="post" 
                          action="{{route('preloader.update')}}" 
                          enctype="multipart/form-data">
                          @csrf
                        <!--logo-->
                        <label class="label">@translate(Preloader Icon)</label>

                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="preloader_icon" id="imageUpload" accept=".png, .jpg, .jpeg"/>
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                     style="background-image: url({{ filePath(config('preloader.preloader_icon') ?? 'preloader.png') }});">
                                </div>
                            </div>
                        </div>
                        <!--logo end-->


                        <!--name-->
                        <div class="form-group">
                            <label class="control-label">@translate(Select Animation) <span
                                    class="text-danger">*</span></label>
                            <div class="">
                                <select class="form-control lang" name="preloader_active_class" required>
                                   @foreach (config('preloader.preloader_classes') as $preloader_class)
                                       <option value="{{ $preloader_class }}" 
                                                {{ config('preloader.preloader_active_class') == $preloader_class ? 'selected' : '' }}>
                                                {{ $preloader_class }}
                                        </option>
                                   @endforeach
                                </select>
                            </div>
                        </div>

                        

                        <label class="label my-2">@translate(Background Color)</label>
                        <div class="input-group my-colorpicker">
                            <input type="text" value="{{ config('preloader.preloader_bg') ?? '#353b48' }}" class="form-control" name="preloader_bg">
                            <div class="card p-3 ml-1 mt-1" style="background: {{ config('preloader.preloader_bg') ?? '#353b48' }}"></div>
                        </div>

                        

                        <label class="label my-2">@translate(Icon Width)</label>
                        <div class="input-group">
                            <input type="number" 
                            value="{{ config('preloader.preloader_icon_witdh') ?? '150' }}" 
                            class="form-control" 
                            name="preloader_icon_witdh">
                        </div>



                        <div class="m-2 float-right">
                            <button class="btn btn-block btn-primary" type="submit">@translate(Save)</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
    "use strict"
    $('.my-colorpicker').colorpicker()
    </script>
@endsection