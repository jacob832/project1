@include('admin.navigation')

<br>
<div class="row" style="margin-left: 20px;">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"><i class="mdi mdi-apple-keyboard-command title_icon"></i> System Settings</h4>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-left: 20px;">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">System Settings</h4>
                    <form class="required-form" action="{{ route('system_settings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="website_name">Website Name<span class="required">*</span></label>
                            <input type="text" name="website_name" id="website_name" class="form-control" value="{{ old('website_name', $systemSettings->website_name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="website_title">Website Title<span class="required">*</span></label>
                            <input type="text" name="website_title" id="website_title" class="form-control" value="{{ old('website_title', $systemSettings->website_title) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="website_keywords">Website Keywords</label>
                            <input type="text" class="form-control bootstrap-tag-input" id="website_keywords" name="website_keywords" data-role="tagsinput" style="width: 100%;" value="{{ old('website_keywords', $systemSettings->website_keywords) }}"/>
                        </div>

                        <div class="form-group">
                            <label for="website_description">Website Description</label>
                            <textarea name="website_description" id="website_description" class="form-control" rows="5">{{ old('website_description', $systemSettings->website_description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $systemSettings->author) }}">
                        </div>

                        <div class="form-group">
                            <label for="slogan">Slogan<span class="required">*</span></label>
                            <input type="text" name="slogan" id="slogan" class="form-control" value="{{ old('slogan', $systemSettings->slogan) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="system_email">System Email<span class="required">*</span></label>
                            <input type="text" name="system_email" id="system_email" class="form-control" value="{{ old('system_email', $systemSettings->system_email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control" rows="5">{{ old('address', $systemSettings->address) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $systemSettings->phone) }}">
                        </div>

                        <div class="form-group">
                            <label for="facebook_url">Facebook URL</label>
                            <input type="text" name="facebook_url" id="facebook_url" class="form-control" value="{{ old('facebook_url', $systemSettings->facebook_url) }}">
                        </div>

                        <div class="form-group">
                            <label for="linkedin_url">LinkedIn URL</label>
                            <input type="text" name="linkedin_url" id="linkedin_url" class="form-control" value="{{ old('linkedin_url', $systemSettings->linkedin_url) }}">
                        </div>

                        <div class="form-group">
                            <label for="youtube_channel">YouTube Channel<span class="required">*</span></label>
                            <input type="text" name="youtube_channel" id="youtube_channel" class="form-control" value="{{ old('youtube_channel', $systemSettings->youtube_channel) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="store">Store<span class="required">*</span></label>
                            <input type="text" name="store" id="store" class="form-control" value="{{ old('store', $systemSettings->store) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="purchase_code">Purchase Code<span class="required">*</span></label>
                            <input type="text" name="purchase_code" id="purchase_code" class="form-control" value="{{ old('purchase_code', $systemSettings->purchase_code) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="language">System Language</label>
                            <select class="form-control select2" data-toggle="select2" name="language" id="language">
                                @foreach ($languages as $language)
                                    <option value="{{ $language }}" {{ old('language', $systemSettings->language) == $language ? 'selected' : '' }}>{{ ucfirst($language) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="student_email_verification">Email Verification</label>
                            <select class="form-control select2" data-toggle="select2" name="student_email_verification" id="student_email_verification">
                                <option value="enable" {{ old('student_email_verification', $systemSettings->student_email_verification) == 'enable' ? 'selected' : '' }}>Enable</option>
                                <option value="disable" {{ old('student_email_verification', $systemSettings->student_email_verification) == 'disable' ? 'selected' : '' }}>Disable</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="footer_text">Footer Text</label>
                            <input type="text" name="footer_text" id="footer_text" class="form-control" value="{{ old('footer_text', $systemSettings->footer_text) }}">
                        </div>

                        <div class="form-group">
                            <label for="footer_link">Footer Link</label>
                            <input type="text" name="footer_link" id="footer_link" class="form-control" value="{{ old('footer_link', $systemSettings->footer_link) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

 
</div>

<br><br><br><br><br><br>

@include('admin.down')
