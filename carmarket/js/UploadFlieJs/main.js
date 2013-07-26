/*
 * jQuery File Upload Plugin JS Example 8.0
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/*jslint nomen: true, unparam: true, regexp: true */
/*global $, window, document */
$(document).ready(function () {
$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'server/php/'
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    if (window.location.hostname === 'blueimp.github.com' ||
            window.location.hostname === 'blueimp.github.io') {
        // Demo settings:
        $('#fileupload').fileupload('option', {
            url: '//jquery-file-upload.appspot.com/',
            disableImageResize: false,
            maxFileSize: 5000000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '//jquery-file-upload.appspot.com/',
                type: 'HEAD'
            }).fail(function () {
                $('<span class="alert alert-error"/>')
                    .text('Upload server currently unavailable - ' +
                            new Date())
                    .appendTo('#fileupload');
            });
        }
    } else {
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function (result) {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, null, {result: result});
        });
    }
	
	<script id="template-upload" type="text/x-tmpl">
						{% for (var i=0, file; file=o.files[i]; i++) { %}
							<tr class="template-upload fade">
								<td>
									<span class="preview"></span>
								</td>
								<td>
									<p class="name">{%=file.name%}</p>
									{% if (file.error) { %}
										<div><span class="label label-important">Error</span> {%=file.error%}</div>
									{% } %}
								</td>
								<td>
									<p class="size">{%=o.formatFileSize(file.size)%}</p>
									{% if (!o.files.error) { %}
										<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
									{% } %}
								</td>
								<td>
									{% if (!o.files.error && !i && !o.options.autoUpload) { %}
										<button class="btn btn-primary start">
											<i class="icon-upload icon-white"></i>
											<span>Start</span>
										</button>
									{% } %}
									{% if (!i) { %}
										<button class="btn btn-warning cancel">
											<i class="icon-ban-circle icon-white"></i>
											<span>Cancel</span>
										</button>
									{% } %}
								</td>
							</tr>
						{% } %}
				</script>
						<!-- The template to display files available for download -->
				<script id="template-download" type="text/x-tmpl">
						{% for (var i=0, file; file=o.files[i]; i++) { %}
							<tr class="template-download fade">
								<td>
									<span class="preview">
										{% if (file.thumbnail_url) { %}
											<a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
										{% } %}
									</span>
								</td>
								<td>
									<p class="name">
										<a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
									</p>
									{% if (file.error) { %}
										<div><span class="label label-important">Error</span> {%=file.error%}</div>
									{% } %}
								</td>
								<td>
									<span class="size">{%=o.formatFileSize(file.size)%}</span>
								</td>
								<td>
									<button class="btn btn-danger delete" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
										<i class="icon-trash icon-white"></i>
										<span>Delete</span>
									</button>
									<input type="checkbox" name="delete" value="1" class="toggle">
								</td>
							</tr>
						{% } %}
		</script>

});
});