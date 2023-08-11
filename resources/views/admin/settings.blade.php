@include('admin.navigation')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"><i class="mdi mdi-apple-keyboard-command title_icon"></i>{{ __('website_settings') }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">{{ __('website_settings') }}</h4>

                <form class="required-form" action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="banner_title">{{ __('banner_title') }}<span class="required">*</span></label>
                        <input type="text" name="banner_title" id="banner_title" class="form-control" value="{{ $siteSettings->banner_title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="banner_sub_title">{{ __('banner_sub_title') }}<span class="required">*</span></label>
                        <input type="text" name="banner_sub_title" id="banner_sub_title" class="form-control" value="{{ $siteSettings->banner_sub_title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="cookie_status">{{ __('cookie_status') }}<span class="required">*</span></label><br>
                        <input type="radio" value="active" name="cookie_status" {{ $siteSettings->cookie_status == 'active' ? 'checked' : '' }}> {{ __('active') }}
                        &nbsp;&nbsp;
                        <input type="radio" value="inactive" name="cookie_status" {{ $siteSettings->cookie_status == 'inactive' ? 'checked' : '' }}> {{ __('inactive') }}
                    </div>
                    <div class="form-group">
                        <label for="cookie_note">{{ __('cookie_note') }}</label>
                        <textarea name="cookie_note" id="cookie_note" class="form-control" rows="5">{{ $siteSettings->cookie_note }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cookie_policy">{{ __('cookie_policy') }}</label>
                        <textarea name="cookie_policy" id="cookie_policy" class="form-control" rows="5">{{ $siteSettings->cookie_policy }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="about_us">{{ __('about_us') }}</label>
                        <textarea name="about_us" id="about_us" class="form-control" rows="5">{{ $siteSettings->about_us }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="terms_and_condition">{{ __('terms_and_condition') }}</label>
                        <textarea name="terms_and_condition" id="terms_and_condition" class="form-control" rows="5">{{ $siteSettings->terms_and_condition }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="privacy_policy">{{ __('privacy_policy') }}</label>
                        <textarea name="privacy_policy" id="privacy_policy" class="form-control" rows="5">{{ $siteSettings->privacy_policy }}</textarea>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('update_settings') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    initSummerNote(['#about_us', '#terms_and_condition', '#privacy_policy', '#cookie_policy']);
  });
</script>

@include('admin.down')
