@extends('backend.layouts.master')
@section('title')@endsection
<title>{{getSystemSetting('type_name')}} | Color Setup</title>
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card m-2">
                <div class="card-header">
                    <h2 class="card-title">@translate(color setup)</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('theme.color.store')}}" enctype="multipart/form-data">
                    @csrf

                        <label class="label my-2">@translate(primary Color)</label>
                        <div class="input-group my-colorpicker">
                            <input type="text" value="{{ theme_color('primary_color') ?? '' }}" class="form-control" name="primary_color">
                            <div class="card p-3 ml-1 mt-1" style="background: {{ theme_color('primary_color')}}"></div>
                        </div>



                        <label class="label my-2">@translate(Secondary Color)</label>
                        <div class="input-group my-colorpicker">
                            <input type="text" value="{{ theme_color('secondary_color') ?? '' }}" class="form-control" name="secondary_color">
                            <div class="card p-3 ml-1 mt-1" style="background: {{ theme_color('secondary_color')}}"></div>
                        </div>



                        <label class="label my-2">@translate(Topbar Color)</label>
                        <div class="input-group my-colorpicker">
                            <input type="text" value="{{ theme_color('topbar_color') ?? '' }}" class="form-control" name="topbar_color">
                            <div class="card p-3 ml-1 mt-1" style="background: {{ theme_color('topbar_color')}}"></div>
                        </div>


                        <label class="label my-2">@translate(Topbar Text Color)</label>
                        <div class="input-group my-colorpicker">
                            <input type="text" value="{{ theme_color('topbar_text_color') ?? '' }}" class="form-control" name="topbar_text_color">
                            <div class="card p-3 ml-1 mt-1" style="background: {{ theme_color('topbar_text_color')}}"></div>
                        </div>


                        <label class="label my-2">@translate(Footer Color)</label>
                        <div class="input-group my-colorpicker">
                            <input type="text" value="{{ theme_color('footer_color') ?? '' }}" class="form-control" name="footer_color">
                            <div class="card p-3 ml-1 mt-1" style="background: {{ theme_color('footer_color')}}"></div>
                        </div>

                        <label class="label my-2">@translate(Footer Text Color)</label>
                        <div class="input-group my-colorpicker">
                            <input type="text" value="{{ theme_color('footer_text_color') ?? '' }}" class="form-control" name="footer_text_color">
                            <div class="card p-3 ml-1 mt-1" style="background: {{ theme_color('footer_text_color')}}"></div>
                        </div>


                        <label class="label my-2">@translate(Hover Color)</label>
                        <div class="input-group my-colorpicker">
                            <input type="text" value="{{ theme_color('hover_color') ?? '' }}" class="form-control" name="hover_color">
                            <div class="card p-3 ml-1 mt-1" style="background: {{ theme_color('hover_color')}}"></div>
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



