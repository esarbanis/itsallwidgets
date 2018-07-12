@extends('master')

@section('title', 'Submit Application')

@section('content')

	<div class="column is-8 is-offset-2">

		<h2 class="title">Submit Application</h2>
		<p>&nbsp;</p>

		<div class="subtitle">Required Fields</div>

		{{ Form::open(array('url' => $url, 'method' => $method)) }}

			<article class="message is-dark">
				<div class="message-body">

					<label class="label" for="title">
						Application Name <span class="required">*</span>
					</label>
					<div class="control">
						{{ Form::text('title') }}
						<!--
						<input
						class="input {{ $errors->has('title') ? ' is-danger' : '' }}"
						type="text"
						name="title"
						value="{{ old('title') }}"
						required>
						-->
						
						@if ($errors->has('title'))
							<span class="help is-danger">
								{{ $errors->first('title') }}
							</span>
						@endif
					</p>

					<label class="label" for="screenshot1_url">
						Screenshot URL <span class="required">*</span>
					</label>
					<div class="control">
						<input
						class="input {{ $errors->has('screenshot1_url') ? ' is-danger' : '' }}"
						type="url"
						name="screenshot1_url"
						value="{{ old('screenshot1_url') }}"
						required>

						@if ($errors->has('screenshot1_url'))
							<span class="help is-danger">
								{{ $errors->first('screenshot1_url') }}
							</span>
						@endif
					</p>

					<div class="field">
						<label class="label" for="short_description">
							Short Description <span class="required">*</span>
						</label>
						<div class="control">
							<input
							class="input {{ $errors->has('short') ? ' is-danger' : '' }}"
							type="text"
							name="short_description"
							value="{{ old('short_description') }}"
							required>

							@if ($errors->has('short_description'))
								<span class="help is-danger">
									{{ $errors->first('short_description') }}
								</span>
							@endif
						</div>
					</div>

					<div class="field">
						<label class="label" for="long_description">
							Long Description <span class="required">*</span>
						</label>
						<div class="control">
							<textarea
				  				class="textarea {{ $errors->has('long_description') ? ' is-danger' : '' }}"
								name="long_description">{{ old('long_description') }}</textarea>

							@if ($errors->has('description'))
								<span class="help is-danger">
									 {{ $errors->first('description') }}
								</span>
							@endif
						</div>
					</div>

				</div>

			</div>
		</article>

		<p>&nbsp;</p>


		<div class="subtitle">Optional Links</div>

		<article class="message">
			<div class="message-body">


				<div class="field">
					<label class="label" for="apple_url">
						Apple App Store
					</label>
					<div class="control has-icons-left">
						<input
						class="input {{ $errors->has('apple_url') ? ' is-danger' : '' }}"
						type="url"
						name="apple_url"
						placeholder="https://itunes.apple.com/app/..."
						value="{{ old('apple_url') }}">

						<span class="icon is-small is-left">
					      <i class="fab fa-apple"></i>
					    </span>

						@if ($errors->has('apple_url'))
							<span class="help is-danger">
								{{ $errors->first('apple_url') }}
							</span>
						@endif
					</div>
				</div>

				<div class="field">
					<label class="label" for="google_url">
						Google Play Store
					</label>
					<div class="control has-icons-left">
						<input
						class="input {{ $errors->has('google_url') ? ' is-danger' : '' }}"
						type="url"
						name="google_url"
						placeholder="https://play.google.com/store/apps/..."
						value="{{ old('google_url') }}">

						<span class="icon is-small is-left">
					      <i class="fab fa-google"></i>
					    </span>

						@if ($errors->has('google_url'))
							<span class="help is-danger">
								{{ $errors->first('google_url') }}
							</span>
						@endif
					</div>
				</div>

				<div class="field">
					<label class="label" for="repo_url">
						Source Code
					</label>
					<div class="control has-icons-left">
						<input
						class="input {{ $errors->has('repo_url') ? ' is-danger' : '' }}"
						type="url"
						name="repo_url"
						placeholder="https://github.com/..."
						value="{{ old('repo_url') }}">

						<span class="icon is-small is-left">
					      <i class="fab fa-github"></i>
					    </span>

						@if ($errors->has('repo_url'))
							<span class="help is-danger">
								{{ $errors->first('repo_url') }}
							</span>
						@endif
					</div>
				</div>

				<div class="field">
					<label class="label" for="website_url">
						Website
					</label>
					<div class="control has-icons-left">
						<input
						class="input {{ $errors->has('website_url') ? ' is-danger' : '' }}"
						type="url"
						name="website_url"
						placeholder="https://example.com"
						value="{{ old('website_url') }}">

						<span class="icon is-small is-left">
					      <i class="fas fa-globe"></i>
					    </span>

						@if ($errors->has('website_url'))
							<span class="help is-danger">
								{{ $errors->first('website_url') }}
							</span>
						@endif
					</div>
				</div>

				<div class="field">
					<label class="label" for="youtube_url">
						YouTube
					</label>
					<div class="control has-icons-left">
						<input
						class="input {{ $errors->has('youtube_url') ? ' is-danger' : '' }}"
						type="url"
						name="youtube_url"
						placeholder="https://youtube.com/..."
						value="{{ old('youtube_url') }}">

						<span class="icon is-small is-left">
					      <i class="fab fa-youtube"></i>
					    </span>

						@if ($errors->has('youtube_url'))
							<span class="help is-danger">
								{{ $errors->first('youtube_url') }}
							</span>
						@endif
					</div>
				</div>

				<div class="field">
					<label class="label" for="facebook_url">
						Facebook
					</label>
					<div class="control has-icons-left">
						<input
						class="input {{ $errors->has('facebook_url') ? ' is-danger' : '' }}"
						type="url"
						name="facebook_url"
						placeholder="https://facebook.com/..."
						value="{{ old('facebook_url') }}">

						<span class="icon is-small is-left">
					      <i class="fab fa-facebook"></i>
					    </span>

						@if ($errors->has('facebook_url'))
							<span class="help is-danger">
								{{ $errors->first('facebook_url') }}
							</span>
						@endif
					</div>
				</div>

				<div class="field">
					<label class="label" for="twitter_url">
						Twitter
					</label>
					<div class="control has-icons-left">
						<input
						class="input {{ $errors->has('twitter_url') ? ' is-danger' : '' }}"
						type="url"
						name="twitter_url"
						placeholder="https://twitter.com/..."
						value="{{ old('twitter_url') }}">

						<span class="icon is-small is-left">
					      <i class="fab fa-twitter"></i>
					    </span>

						@if ($errors->has('twitter_url'))
							<span class="help is-danger">
								{{ $errors->first('twitter_url') }}
							</span>
						@endif
					</div>
				</div>



			</div>
		</div>

		<p>&nbsp;</p>
		<p>&nbsp;</p>

		<div class="columns is-centered">
			<div class="control">
				<a href="{{ url('/') }}" class="button is-medium is-outlined">Cancel</a> &nbsp;
				<button class="button is-info is-medium">Submit</button>
			</div>
		</div>

		<p>&nbsp;</p>
		<p>&nbsp;</p>

	{{ Form::close() }}

</div>
@stop