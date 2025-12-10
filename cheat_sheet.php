<div class="large-4 columns code-column">		
			<h4><a name="artisan" href="#routing">Artisan</a></h4>
			<pre class="prettyprint lang-php">php artisan migrate:make create_users_table [--bench="vendor/package"] // Create new migration file
				php artisan migrate [--bench="vendor/package"] // Run the database migrations
				php artisan migrate --env=local  // Run the database migrations
				php artisan migrate:rollback // Rollback the last database migration
				php artisan migrate:reset // Rollback all database migrations
				php artisan migrate:refresh // Rollback all migrations and run them again
				php artisan db:seed // Seed the database with records
				php artisan config:publish //vendor/package // Publish a package's configuration files
				php artisan serve // Serve the application on the PHP development server
				php artisan list // List all available Artisan commands
			</pre>

			<h4><a name="composer" href="#routing">Composer</a></h4>
			<pre class="prettyprint lang-php">composer create-project laravel/laravel folder_name // Create Laravel project in folder_name
				composer install // Use this command when you first clone a project
				composer update // Use this command when you add a package or want to update dependencies
				composer dump-autoload // Regenerate the list of all classes that need to be included in the project
				composer self-update // Update Composer to the latest version
			</pre>
		
		
		
			<h4><a name="routing" href="#routing">Routing</a></h4>
			<pre class="prettyprint lang-php">Route::get('foo', function(){}); // Basic GET route
				Route::get('foo', 'ControllerName@function'); // GET route to controller method
				Route::controller('foo', 'FooController'); // RESTful controller route
			</pre>

			<h6>Triggering Errors</h6>
			<pre class="prettyprint lang-php">App::abort(404); // Abort with a 404 error
				App::missing(function($exception){}); // Custom 404 handler
				throw new NotFoundHttpException; // Throw a 404 error
			</pre>

			<h6>Route Parameters</h6>
			<pre class="prettyprint lang-php">Route::get('foo/{bar}', function($bar){}); // Required parameter
				Route::get('foo/{bar?}', function($bar = 'bar'){}); // Optional parameter with default value
			</pre>

			<h6>HTTP Verbs</h6>
			<pre class="prettyprint lang-php">Route::any('foo', function(){}); // Respond to any HTTP verb
				Route::post('foo', function(){}); // POST route
				Route::put('foo', function(){}); // PUT route
				Route::patch('foo', function(){}); // PATCH route
				Route::delete('foo', function(){}); // DELETE route
				Route::resource('foo', 'FooController'); // RESTful actions
			</pre>

			<h6>Secure Routes</h6>
			<pre class="prettyprint lang-php">Route::get('foo', array('https', function(){})); // Secure route
			</pre>

			<h6>Route Constraints</h6>
			<pre class="prettyprint lang-php">Route::get('foo/{bar}', function($bar){})
					->where('bar', '[0-9]+'); // Single parameter constraint
				Route::get('foo/{bar}/{baz}', function($bar, $baz){})
					->where(array('bar' => '[0-9]+', 'baz' => '[A-Za-z]')) // Multiple parameter constraints
			</pre>

			<h6>Filters</h6>
			<pre class="prettyprint lang-php">Route::filter('auth', function(){}); // Register a Closure as a filter
				Route::filter('foo', 'FooFilter'); // Register a class as a filter
				Route::get('foo', array('before' => 'auth', function(){})); // Apply filter to a route
				Route::group(array('before' => 'auth'), function(){}); // Apply filter to a route group
				Route::when('foo/*', 'foo'); // Pattern filter
				Route::when('foo/*', 'foo', array('post')); // HTTP verb pattern
			</pre>

			<h6>Named Routes</h6>
			<pre class="prettyprint lang-php">Route::currentRouteName(); // Get current route name
				Route::get('foo/bar', array('as' => 'foobar', function(){})); // Name a route
			</pre>

			<h6>Route Prefixing</h6>
			<pre class="prettyprint lang-php">Route::group(array('prefix' => 'foo'), function(){}); // This route group will be accessed via /foo/*
			</pre>

			<h6>Sub-Domain Routing</h6>
			<pre class="prettyprint lang-php">Route::group(array('domain' => '{sub}.example.com'), function(){}); // This route group will respond to {sub}.example.com
			</pre>

		<h4><a name="urls" href="#urls">URLs</a></h4>
			<pre class="prettyprint lang-php">URL::full(); // Full URL
URL::current(); // Current page
URL::previous(); // Previous page
URL::to('foo/bar', $parameters, $secure); // Generate URL
URL::action('FooController@method', $parameters, $absolute); // Generate URL to controller action
URL::route('foo', $parameters, $absolute); // Generate URL to named route
URL::secure('foo/bar', $parameters); // Generate secure URL
URL::asset('css/foo.css', $secure); // Generate asset URL
URL::secureAsset('css/foo.css'); // Generate secure asset URL
URL::isValidUrl('http://example.com'); // Check if URL is valid
URL::getRequest(); // Get the current request instance
URL::setRequest($request); // Set the current request instance
URL::getGenerator(); // Get the URL generator instance
URL::setGenerator($generator); // Set the URL generator instance
			</pre>


			<h4><a name="events" href="#events">Events</a></h4>
			<pre class="prettyprint lang-php">Event::fire('foo.bar', array($bar)); // Fire an event
				Event::listen('foo.bar', function($bar){}); // Listen for an event with Closure
				Event::listen('foo.*', function($bar){}); // Listen for wildcard event with Closure
				Event::listen('foo.bar', 'FooHandler', 10); // Listen for an event with class and priority
				Event::listen('foo.bar', 'BarHandler', 5); // Listen for an event with class and priority
				Event::listen('foor.bar', function($event){ return false; }); // Stop event propagation
				Event::queue('foo', array($bar)); // Queue an event
				Event::flusher('foo', function($bar){}); // Flush an event with Closure
				Event::flush('foo'); // Flush an event
				Event::subscribe(new FooEventHandler); // Subscribe to events using a class
			</pre>
			
			<h4><a name="db" href="#db">DB</a></h4>
			<pre class="prettyprint lang-php">$results = DB::select('select * from users where id = ?', array('value')); // Select Query
				DB::insert('insert into users (id, name) values (?, ?)', array(1, 'Dayle')); // Insert Query
				DB::update('update users set votes = 100 where name = ?', array('John')); // Update Query
				DB::delete('delete from users'); // Delete Query
				DB::statement('drop table users'); // Execute Statement
				DB::listen(function($sql, $bindings, $time){ code_here() }); // Listen for query execution
				DB::transaction(function(){  code_here() }); // Transaction
			</pre>

			<h4><a name="eloquent" href="#eloquent">Eloquent</a></h4>
			<pre class="prettyprint lang-php">Model::create(array('key' => 'value')); // Create new model
				Model::destroy(1); // Destroy model with id 1
				Model::destroy(array(1, 2, 3)); // Destroy models with id 1,2,3
				Model::destroy(1, 2, 3); // Destroy models with id 1,2,3
				Model::all(); // Get all models
				Model::find(1); // Find model with id 1
				Model::findOrFail(1); // Find model with id 1 or throw error if not found
				Model::where('foo', '=', 'bar')->get(); // Get models with where condition
				Model::where('foo', '=', 'bar')->first(); // Get first row with where condition
				Model::where('foo', '=', 'bar')->firstOrFail(); // Get first row with where or throw error if not found
				Model::where('foo', '=', 'bar')->count(); // Get row count with where condition
				Model::where('foo', '=', 'bar')->delete(); // Delete with where condition
				Model::whereRaw('foo = bar and cars = 2', array(20))->get(); // Get models with raw where condition
				Model::on('connection-name')->find(1); // Use specific connection
				Model::with('relation')->get(); // Eager load relationship
				Model::all()->take(10); // Get 10 models
				Model::all()->skip(10); // Skip 10 models
			</pre>

			<h6>Soft Delete</h6>
			<pre class="prettyprint lang-php">Model::withTrashed()->where('cars', 2)->get(); // Get all models including soft deleted
				Model::withTrashed()->where('cars', 2)->restore(); // Restore soft deleted models
				Model::where('cars', 2)->forceDelete(); // Permanently delete models
				Model::onlyTrashed()->where('cars', 2)->get(); // Get only soft deleted models
			</pre>

			<h6>Events</h6>
			<pre class="prettyprint lang-php">Model::creating(function($model){}); // Before creating a model
				Model::created(function($model){}); // After a model has been created
				Model::updating(function($model){}); // Before updating a model
				Model::updated(function($model){}); // After a model has been updated
				Model::saving(function($model){}); // Before saving a model (creating or updating)
				Model::saved(function($model){}); // After a model has been saved (created or updated)
				Model::deleting(function($model){}); // Before deleting a model
				Model::deleted(function($model){}); // After a model has been deleted
				Model::observe(new FooObserver); // Register an observer class
			</pre>


			<h4><a name="mail" href="#mail">Mail</a></h4>
			<pre class="prettyprint lang-php">Mail::send('email.view', $data, function($message){}); // Send email
				Mail::send(array('html.view', 'text.view'), $data, $callback); // Send multipart email
				Mail::queue('email.view', $data, function($message){}); // Queue email
				Mail::queueOn('queue-name', 'email.view', $data, $callback); // Queue email on specific queue
				Mail::later(5, 'email.view', $data, function($message){}); // Queue email to be sent after delay (in minutes)
				Mail::pretend(); // Write all email to logs instead of sending // useful for local development
			</pre>

			<h4><a name="queues" href="#queues">Queues</a></h4>
			<pre class="prettyprint lang-php">Queue::push('SendMail', array('message' => $message)); // Push a job onto the default queue
				Queue::push('SendEmail@send', array('message' => $message)); // Push a job onto the default queue with specific method
				Queue::push(function($job) use $id {}); // Push a Closure job onto the default queue
				php artisan queue:listen // Listen to the default queue
				php artisan queue:listen connection // Listen to the specified connection
				php artisan queue:listen --timeout=60 // Listen to the default queue with timeout
				php artisan queue:work // Process the next job on the default queue
			</pre>

			<h4><a name="localization" href="#localization">Localization</a></h4>
			<pre class="prettyprint lang-php">App::setLocale('en'); // Set the locale
				Lang::get('messages.welcome'); // Get the translation for 'messages.welcome'
				Lang::get('messages.welcome', array('foo' => 'Bar')); // Get the translation with replacement
				Lang::has('messages.welcome'); // Check if translation exists
				Lang::choice('messages.apples', 10); // Get the translation according to a count
			</pre>

			<h4><a name="files" href="#files">Files</a></h4>
			<pre class="prettyprint lang-php">File::exists('path'); // Check if file exists
				File::get('path'); // Get file contents
				File::getRemote('path'); // Get remote file contents
				File::getRequire('path'); // Get and require file contents
				File::requireOnce('path'); // Require file once
				File::put('path', 'contents'); // Put contents to file
				File::append('path', 'data'); // Append data to file
				File::delete('path'); // Delete file
				File::move('path', 'target'); // Move file
				File::copy('path', 'target'); // Copy file
				File::extension('path'); // Get file extension
				File::type('path'); // Get file type
				File::size('path'); // Get file size
				File::lastModified('path'); // Get file last modified time
				File::isDirectory('directory'); // Check if path is a directory
				File::isWritable('path'); // Check if file is writable
				File::isFile('file'); // Check if path is a file
				File::glob($patterns, $flag); // Get path names matching a given pattern
				File::files('directory'); // Get all of the files from the given directory.
				File::allFiles('directory'); // Get an array of all files in a directory.
				File::directories('directory'); // Get all of the files from the given directory (recursive).
				File::makeDirectory('path',  $mode = 0777, $recursive = false); // Create directory
				File::copyDirectory('directory', 'destination', $options = null); // Copy directory
				File::deleteDirectory('directory', $preserve = false); // Delete directory
				File::cleanDirectory('directory'); // Clean directory contents
			</pre>
		</div>
		<div class="large-4 columns code-column">
			<h4><a name="input" href="#input">Input</a></h4>
			<pre class="prettyprint lang-php">Input::get('key'); // Get input value
				Input::get('key', 'default'); // Get input value
				Input::has('key'); // Check if input exists
				Input::all(); // Get all input values
				Input::only('foo', 'bar'); // Get only foo and bar inputs
				Input::except('foo'); // Disregard 'foo' when getting input
			</pre>

			<h6>Session Input (flash)</h6>
			<pre class="prettyprint lang-php">Input::flash(); // Flash input to the session
				Input::flashOnly('foo', 'bar'); // Flash only foo and bar inputs to the session
				Input::flashExcept('foo', 'baz'); // Flash all inputs except foo and baz to the session
				Input::old('key','default_value'); // Get old input value
			</pre>

			<h6>Files</h6>
			<pre class="prettyprint lang-php">Input::file('filename'); // Use a file that's been uploaded
				Input::hasFile('filename'); // Determine if a file was uploaded
				Input::file('name')->getRealPath(); // Access file properties
				Input::file('name')->getClientOriginalName(); // Access file properties
				Input::file('name')->getSize(); // Access file properties
				Input::file('name')->getMimeType(); // Access file properties
				Input::file('name')->move($destinationPath); // Move uploaded file from input with original name
				Input::file('name')->move($destinationPath, $fileName); // Move uploaded file from input with custom name
			</pre>

			<h4><a name="cache" href="#cache">Cache</a></h4>
			<pre class="prettyprint lang-php">Cache::put('key', 'value', $minutes); // Set cache
				Cache::add('key', 'value', $minutes); // Set cache if not exists
				Cache::forever('key', 'value'); // Set cache forever
				Cache::remember('key', $minutes, function(){ return 'value' }); // Get or set cache
				Cache::rememberForever('key', function(){ return 'value' }); // Get or set cache forever
				Cache::forget('key'); // Delete cache by key
				Cache::has('key'); // Check if cache exists
				Cache::get('key'); // Get cache
				Cache::get('key', 'default'); // Get cache with default value
				Cache::get('key', function(){ return 'default'; }); // Get cache with Closure default value
				Cache::increment('key'); // Increment cache value
				Cache::increment('key', $amount); // Increment cache value by amount
				Cache::decrement('key'); // Decrement cache value
				Cache::decrement('key', $amount); // Decrement cache value by amount
				Cache::section('group')->put('key', $value); // Set cache in section
				Cache::section('group')->get('key'); // Get cache from section
				Cache::section('group')->flush(); 	// Flush section cache
			</pre>

			<h4><a name="cookies" href="#cookies">Cookies</a></h4>
			<pre class="prettyprint lang-php">Cookie::get('key'); // Get cookie
				Cookie::forever('key', 'value'); // Create a cookie that lasts for ever
				$response = Response::make('Hello World'); // Send a cookie with a response
				$response->withCookie(Cookie::make('name', 'value', $minutes)); // Create a cookie that lasts for specified minutes
			</pre>

			<h4><a name="sessions" href="#sessions">Sessions</a></h4>
			<pre class="prettyprint lang-php">Session::get('key'); // Get session
				Session::get('key', 'default'); // Get session with default value
				Session::get('key', function(){ return 'default'; }); // Get session with Closure default value
				Session::put('key', 'value'); // Set session
				Session::all(); // Get all sessions
				Session::has('key'); // Check if session exists
				Session::forget('key'); // Clear specified session
				Session::flush(); // Clear all sessions
				Session::regenerate(); // Regenerate session ID
				Session::flash('key', 'value'); // Flash data to session
				Session::reflash(); // Reflash all flash data
				Session::keep(array('key1', 'key2')); // Keep specific flash data
			</pre>

			<h4><a name="redis" href="#redis">Redis</a></h4>
			<pre class="prettyprint lang-php">$redis = Redis::connection(); // Connect to Redis
				$redis->connection('otherServer'); // Connect to specified Redis server
				$redis->set('name', 'Tuana Şeyma'); // Set Redis value
				$redis->get('name'); // Get Redis value
				$redis->lrange('isimler', 5, 10); // Get list range
				$redis->pipeline(function($pipe){}); // Run commands in a pipeline
			</pre>

			<h4><a name="requests" href="#requests">Requests</a></h4>
			<pre class="prettyprint lang-php">Request::path(); // Get request path
				Request::is('foo/*'); // Check if request matches pattern
				Request::url(); // Get full URL
				Request::segment(1); // Get URL segment
				Request::header('Content-Type'); // Get request header
				Request::server('PATH_INFO'); // Get server variable
				Request::ajax(); // Check if request is AJAX
				Request::secure(); // Check if request is HTTPS
			</pre>

			<h4><a name="responses" href="#responses">Responses</a></h4>
			<pre class="prettyprint lang-php">return Response::make($contents); // Create a basic response
				return Response::make($contents, 200); // Create a response with status code
				return Response::json(array('key' => 'value')); // Create a JSON response
				return Response::json(array('key' => 'value'))
					->setCallback(Input::get('callback')); // Create a JSONP response
				return Response::download($filepath); // Create a file download response
				return Response::download($filepath, $filename, $headers); // Create a file download response with custom filename and headers
				$response = Response::make($contents, 200); // Create a response with status code
				$response->header('Content-Type', 'application/json'); // Set a header on the response
				return $response; // Return the response
				return Response::make($content)
					->withCookie(Cookie::make('key', 'value')); // Attach a cookie to a response
			</pre>

			<h4><a name="redirects" href="#redirects">Redirects</a></h4>
			<pre class="prettyprint lang-php">return Redirect::to('foo/bar'); // Redirect to page
				return Redirect::to('foo/bar')->with('key', 'value'); // Redirect with value
				return Redirect::to('foo/bar')->withInput(Input::get()); // Redirect with all input
				return Redirect::to('foo/bar')->withInput(Input::except('password')); // Redirect with input except password
				return Redirect::to('foo/bar')->withErrors($validator); // Redirect with validation errors
				return Redirect::back(); // Redirect to previous page
				return Redirect::route('foobar'); // Redirect to route
				return Redirect::route('foobar', array('value')); // Redirect to route with values
				return Redirect::route('foobar', array('key' => 'value')); // Redirect to route with values
				return Redirect::action('FooController@index'); // Redirect to controller
				return Redirect::action('FooController@baz', array('value')); // Redirect to controller with values
				return Redirect::action('FooController@baz', array('key' => 'value')); // Redirect to controller with values
			</pre>

			<h4><a name="ioc" href="#ioc">IoC Container</a></h4>
			<pre class="prettyprint lang-php">App::bind('foo', function($app){ return new Foo; }); // Bind a class or interface
				App::make('foo');  // Create an instance of the class or interface
				App::make('FooBar'); // If this class exists, it's returned
				App::singleton('foo', function(){ return new Foo; }); // Bind a singleton
				App::instance('foo', new Foo); // Bind an existing instance
				App::bind('FooRepositoryInterface', 'BarRepository'); // Bind interface to implementation
				App::register('FooServiceProvider'); // Register a service provider
				App::resolving(function($object){}); // Listen for object resolution
			</pre>

			<h4><a name="security" href="#security">Security</a></h4>
			<h6>Şifreler (Passwords)</h6>
			<pre class="prettyprint lang-php">Hash::make('secretpassword'); // Generate new hashed key
				Hash::check('secretpassword', $hashedPassword); // Check hashed key
				Hash::needsRehash($hashedPassword); // Check if hashed key needs rehashing
			</pre>
			<h6>Kimlik (Auth)</h6>
			<pre class="prettyprint lang-php">Auth::check(); // Check if user is logged in
				Auth::user(); // Get user information
				Auth::attempt(array('email' => $email, 'password' => $password)); // Attempt user login
				Auth::attempt($credentials, true); // Attempt user login with remember me
				Auth::once($credentials); // Log in for a single request
				Auth::login(User::find(1)); // Log in user by model
				Auth::loginUsingId(1); // Log in user by id
				Auth::logout(); // Log out user
				Auth::validate($credentials); // Validate user credentials
				Auth::basic('username'); // HTTP Basic Auth
				Auth::onceBasic(); // HTTP Basic Auth for single request
				Password::remind($credentials, function($message, $user){}); // Send password reminder
			</pre>

			<h6>Şifreleme (Encryption)</h6>
			<pre class="prettyprint lang-php">Crypt::encrypt('secretstring'); // Encrypt string
				Crypt::decrypt($encryptedString); // Decrypt string
				Crypt::setMode('ctr'); // Set cipher mode
				Crypt::setCipher($cipher); // Set cipher
			</pre>

			<h4><a name="validation" href="#validation">Validation</a></h4>
			<pre class="prettyprint lang-php">Validator::make(
				array('key' => 'Foo'),
				array('key' => 'required|in:Foo')
				); // Create validator instance
				Validator::extend('foo', function($attribute, $value, $params){}); // Custom validator using Closure
				Validator::extend('foo', 'FooValidator@validate'); // Custom validator using class
				Validator::resolver(function($translator, $data, $rules, $msgs)
				{
					return new FooValidator($translator, $data, $rules, $msgs);
				}); // Custom validator using resolver
			</pre>

			<h6>Rules</h6>
			<pre class="prettyprint lang-php">accepted // The field under validation must be yes, on, 1, or true.
				active_url // The field under validation must be a valid URL according to the checkdnsrr PHP function.
				after:YYYY-MM-DD // The field under validation must be a value after a given date.
				before:YYYY-MM-DD // The field under validation must be a value preceding the given date.
				alpha // The field under validation must be entirely alphabetic characters.
				alpha_dash // The field under validation may have alpha-numeric characters, as well as dashes and underscores.
				alpha_num // The field under validation must be entirely alpha-numeric characters.
				between:1,10 // The field under validation must have a size between the given min and max.
				confirmed // The field under validation must have a matching field of foo_confirmation.
				date // The field under validation must be a valid date.
				date_format:YYYY-MM-DD // The field under validation must match the given date format.
				different:fieldname // The field under validation must be different from the given field.
				email // The field under validation must be formatted as an e-mail address.
				exists:table,column // The field under validation must exist on a given database table.
				image // The file under validation must be an image (jpeg, png, bmp, gif, or svg)
				in:foo,bar,baz // The field under validation must be included in the given list of values.
				not_in:foo,bar,baz // The field under validation must not be included in the given list of values.
				integer // The field under validation must be an integer.
				numeric // The field under validation must be numeric.
				ip // The field under validation must be an IP address.
				max:value // The field under validation must be less than or equal to a maximum value.
				min:value // The field under validation must be greater than or equal to a minimum value.
				mimes:jpeg,png // The file under validation must have a MIME type corresponding to one of the listed extensions.
				regex:[0-9] // The field under validation must match the given regular expression.
				required // The field under validation must be present in the input data and not empty.
				required_if:field,value // The field under validation must be present and not empty if the anotherfield field is equal to any value.
				required_with:foo,bar,baz // The field under validation must be present and not empty only if any of the other specified fields are present.
				required_without:foo,bar,baz // The field under validation must be present and not empty only when any of the other specified fields are not present.
				same:field // The given field must match the field under validation.
				size:value // The field under validation must have a size matching the given value.
				unique:table,column,except,idColumn // The field under validation must be unique on a given database table.
				url

			</pre>
			
		</div>
		<div class="large-4 columnsi code-column">
			<h4><a name="views" href="#views">Views</a></h4>
			<pre class="prettyprint lang-php">View::make('path/to/view'); // Load view
				View::make('foo/bar')->with('key', 'value'); // Load view with specified value
				View::make('foo/bar', array('key' => 'value')); // Load view with specified array				
				View::share('key', 'value'); // Share a value across all views
				View::make('foo/bar')->nest('name', 'foo/baz', $data); // Nest view 'foo/baz' as 'name' in 'foo/bar'
				View::composer('viewname', function($view){}); // Register a view composer
				View::composer(array('view1', 'view2'), function($view){}); // Register multiple views to a composer
				View::composer('viewname', 'FooComposer'); // Register a class based view composer
				View::creator('viewname', function($view){}); // Register a view creator
			</pre>

			<h4><a name="blade" href="#blade">Blade Templates</a></h4>
			<pre class="prettyprint lang-php">@extends('layout.name') // Extend layout
				@section('name') // Start section
				@stop // End section 
				@yield('name') // Display section in template
				@include('view.name') // Include view file
				@include('view.name', array('key' => 'value')); // Include view file with array
				@lang('messages.name') // Localization
				@choice('messages.name', 1); // Pluralization
				@if // (condition)
				@else // Else condition
				@elseif // Else if condition
				@endif // End if
				@unless // (condition)
				@endunless // End unless
				@for // (initialization; condition; increment)
				@endfor // End for
				@foreach // ($array as $key => $value)
				@endforeach // End foreach
				@while // (condition)
				@endwhile // End while
				{{ $var  }} // Display content
				{{{ $var }}} // Display escaped content
				{{-- Blade Comment --}} // Blade comment example
			</pre>

			<h4><a name="forms" href="#forms">Forms</a></h4>
			<pre class="prettyprint lang-php">Form::open(array('url' => 'foo/bar', 'method' => 'PUT')); // Open form
				Form::open(array('route' => 'foo.bar')); // Open form to named route
				Form::open(array('route' => array('foo.bar', $parameter))); // Open form to named route with parameter
				Form::open(array('action' => 'FooController@method')); // Open form to controller action
				Form::open(array('action' => array('FooController@method', $parameter))); // Open form to controller action with parameter
				Form::open(array('url' => 'foo/bar', 'files' => true)); // Open form with file upload
				Form::token(); // CSRF token field
				Form::model($foo, array('route' => array('foo.bar', $foo->bar))); // Open form with model binding
			</pre>

			<h6>Form Elements</h6>
			<pre class="prettyprint lang-php">Form::label('id', 'Description'); // Label element
				Form::label('id', 'Description', array('class' => 'foo')); // Label with attributes
				Form::text('name'); // Text input
				Form::text('name', $value); // Text input with value
				Form::hidden('foo', $value); // Hidden input
				Form::password('password'); // Password input
				Form::email('name', $value, array()); // Email input
				Form::file('name', array()); // File input
				Form::checkbox('name', 'value'); // Checkbox input
				Form::radio('name', 'value'); // Radio input
				Form::select('name', array('key' => 'value')); // Select input
				Form::select('name', array('key' => 'value'), 'key'); // Select input with selected value
				Form::submit('Submit!'); // Submit button
				Form::macro('fooField', function()
				{
					return '&lt;input type="custom"/&gt;';
				}); // Register custom macro
				Form::fooField(); // Use custom macro
			</pre>

			<h4><a name="html" href="#html">HTML Builder</a></h4>
			<pre class="prettyprint lang-php">HTML::macro('name', function(){}); // Register custom macro
HTML::entities($value); // Escape value
HTML::decode($value); // Decode HTML entities
HTML::script($url, $attributes); // Generate script tag
HTML::style($url, $attributes); // Generate link tag
HTML::link($url, 'title', $attributes, $secure); // Generate HTML link
HTML::secureLink($url, 'title', $attributes); // Generate HTTPS HTML link
HTML::linkAsset($url, 'title', $attributes, $secure); // Generate HTML link to asset
HTML::linkSecureAsset($url, 'title', $attributes); // Generate HTTPS HTML link to asset
HTML::linkRoute($name, 'title', $parameters, $attributes); // Generate HTML link to named route
HTML::linkAction($action, 'title', $parameters, $attributes); // Generate HTML link to controller action
HTML::mailto($email, 'title', $attributes); // Generate HTML mailto link
HTML::email($email); // Obfuscate email address
HTML::ol($list, $attributes); // Generate ordered list
HTML::ul($list, $attributes); // Generate unordered list
HTML::listing($type, $list, $attributes); // Generate listing
HTML::listingElement($key, $type, $value); // Generate listing element
HTML::nestedListing($key, $type, $value); // Generate nested listing
HTML::attributes($attributes); // Generate HTML attributes from array
HTML::attributeElement($key, $value); // Generate single HTML attribute
HTML::obfuscate($value); // Obfuscate a string
			</pre>

			<h4><a name="str" href="#str">Strings</a></h4>
			<pre class="prettyprint lang-php">Str::ascii($value) // Transliterate a UTF-8 value to ASCII.
				Str::camel($value) // Convert a value to camelCase.
				Str::contains($haystack, $needle) // Determine if a given string contains a given value.
				Str::endsWith($haystack, $needles) // Determine if a given string ends with a given value.
				Str::finish($value, $cap) // Cap a string with a single instance of a given value.
				Str::is($pattern, $value) // Determine if a given string matches a given pattern.
				Str::length($value) // Get the length of a given string.
				Str::limit($value, $limit = 100, $end = '...') // Limit the number of characters in a string.
				Str::lower($value) // Convert the given string to lower-case.
				Str::words($value, $words = 100, $end = '...') // Limit the number of words in a string.
				Str::plural($value, $count = 2) // Get the plural form of an English word.
				Str::random($length = 16) // Generate a more truly "random" alpha-numeric string.
				Str::quickRandom($length = 16) // Generate a "random" alpha-numeric string.
				Str::upper($value) // Convert the given string to upper-case.
				Str::title($value) // Convert the given string to title case.
				Str::singular($value) // Get the singular form of an English word.
				Str::slug($title, $separator = '-') // Generate a URL friendly "slug" from a given string.
				Str::snake($value, $delimiter = '_') // Convert a value to snake_case.
				Str::startsWith($haystack, $needles) // Determine if a given string starts with a given value.
				Str::studly($value) // Convert a value to StudlyCase.
				Str::macro($name, $macro) // Register a custom macro.
			</pre>
			

			<h4><a name="helpers" href="#helpers">Helpers</a></h4>
			<h6>Arrays</h6>
			<pre class="prettyprint lang-php">array_add($array, 'key', 'value'); // Add an element to an array if it doesn't exist
				array_build($array, function(){}); // Build a new array using a Closure
				array_divide($array); // Divide array into two arrays
				array_dot($array); // Flatten a multi-dimensional array using "dot" notation
				array_except($array, array('key')); // Return array without specified key => values
				array_fetch($array, 'key'); // Return array of key => values
				array_first($array, function($key, $value){}, $default); // First element passing truth test
				array_flatten($array); // Strips keys from the array
				array_forget($array, 'foo'); // Remove array key
				array_forget($array, 'foo.bar'); // Dot notation
				array_get($array, 'foo', 'default'); // Get array value
				array_get($array, 'foo.bar', 'default'); // Dot notation
				array_only($array, array('key')); // Return only specified key => values
				array_pluck($array, 'key'); // Return array of key => values
				array_pull($array, 'key'); // Return and remove 'key' from array
				array_set($array, 'key', 'value'); // Set array value
				array_set($array, 'key.subkey', 'value'); // Dot notation
				array_sort($array, function(){}); // Sort array using Closure
				head($array); // First element of an array
				last($array); // Last element of an array
			</pre>
			<h6>Paths</h6>
			<pre class="prettyprint lang-php">app_path();
				public_path(); // Public path
				base_path(); // App root path
				storage_path(); // Storage path
			</pre>
			<h6>Strings</h6>
			<pre class="prettyprint lang-php">camel_case($value); // Result: fooBar
				class_basename($class); // Get class name from namespaced class
				e('&lt;html&gt;'); // Escape a string
				starts_with('Foo bar.', 'Foo'); // Check if string starts with given value
				ends_with('Foo bar.', 'bar.'); // Check if string ends with given value
				snake_case('fooBar'); // Result: foo_bar
				str_contains('Hello foo bar.', 'foo'); // Check if string contains given value
				str_finish('foo/bar', '/'); // Result: foo/bar/
				str_is('foo*', 'foobar'); // Check if string matches pattern
				str_plural('car'); // Result: cars
				str_random(25); // Generate random string
				str_singular('cars'); // Result: car
				studly_case('foo_bar'); // Result: FooBar
				trans('foo.bar'); // Translation string
				trans_choice('foo.bar', $count); // Plural translation string
			</pre>
			<h6>URLs and Links</h6>
			<pre class="prettyprint lang-php">action('FooController@method', $parameters); // URL to controller action
				link_to('foo/bar', $title, $attributes, $secure); // HTML Link
				secure_link_to('foo/bar', $title, $attributes); // HTTPS Link
				link_to_asset('img/foo.jpg', $title, $attributes, $secure); // HTML Link
				link_to_route('route.name', $title, $parameters, $attributes); // HTML Link
				link_to_action('FooController@method', $title, $params, $attributes); // HTML Link
				asset('img/photo.jpg', $title, $attributes); // HTML Link
				secure_asset('img/photo.jpg', $title, $attributes); // HTTPS link
				secure_url('path', $parameters); // HTTPS URL
				route($route, $parameters, $absolute = true); // URL to named route
				url('path', $parameters = array(), $secure = null); // URL to path
		</pre>
		<h6>Miscellaneous</h6>
		<pre class="prettyprint lang-php">csrf_token(); // Get CSRF token value
				old('key', 'default_value'); // Get old input value
				dd($value); // Dump and die
				value(function(){ return 'bar'; }); // Return the value from the given Closure
				with(new Foo)->chainedMethod(); // Return the given value, allowing for method chaining
		</pre>

		</div>