// heading

	<h2 style="color: #FFF; text-align: center;">Laravel Cheat Sheet</h2>
	<hr/>

<div class="large-4 columns code-column">		
			<h4><a name="artisan" href="#routing">Artisan</a></h4>
			<pre class="prettyprint lang-php">php artisan make:migration create_users_table // Create new migration file
				php artisan migrate // Run the database migrations
				php artisan migrate --force // Force run migrations in production
				php artisan migrate:rollback // Rollback the last database migration
				php artisan migrate:rollback --step=5 // Rollback last 5 migrations
				php artisan migrate:reset // Rollback all database migrations
				php artisan migrate:refresh // Rollback all migrations and run them again
				php artisan migrate:fresh // Drop all tables and re-run migrations
				php artisan migrate:status // Show the status of each migration
				php artisan db:seed // Seed the database with records
				php artisan db:seed --class=UserSeeder // Run specific seeder
				php artisan make:model User -mfsc // Create model with migration, factory, seeder, and controller
				php artisan make:controller UserController --resource // Create resource controller
				php artisan make:request StoreUserRequest // Create form request validation
				php artisan make:middleware CheckAge // Create middleware
				php artisan make:command SendEmails // Create Artisan command
				php artisan make:job ProcessPodcast // Create job class
				php artisan make:event UserRegistered // Create event class
				php artisan make:listener SendWelcomeEmail // Create event listener
				php artisan make:policy PostPolicy // Create policy class
				php artisan make:rule Uppercase // Create validation rule
				php artisan route:list // List all registered routes
				php artisan route:cache // Cache routes for faster registration
				php artisan route:clear // Clear route cache
				php artisan config:cache // Cache configuration files
				php artisan config:clear // Clear configuration cache
				php artisan view:cache // Compile all Blade templates
				php artisan view:clear // Clear compiled view files
				php artisan optimize // Cache framework bootstrap files
				php artisan optimize:clear // Remove cached bootstrap files
				php artisan serve // Serve the application on the PHP development server
				php artisan serve --port=8080 // Serve on specific port
				php artisan tinker // Interact with your application
				php artisan list // List all available Artisan commands
				php artisan queue:work // Start processing jobs on the queue
				php artisan queue:restart // Restart queue worker daemons
				php artisan schedule:run // Run scheduled commands
				php artisan storage:link // Create symbolic link from public/storage to storage/app/public
			</pre>

			<h4><a name="composer" href="#routing">Composer</a></h4>
			<pre class="prettyprint lang-php">composer create-project laravel/laravel folder_name // Create Laravel project in folder_name
				composer create-project laravel/laravel folder_name "10.*" // Create Laravel project with specific version
				composer install // Use this command when you first clone a project
				composer update // Use this command when you add a package or want to update dependencies
				composer require vendor/package // Add a package to composer.json and install
				composer require vendor/package --dev // Add package to dev dependencies
				composer remove vendor/package // Remove a package
				composer dump-autoload // Regenerate the list of all classes that need to be included in the project
				composer dump-autoload -o // Optimize autoload files
				composer self-update // Update Composer to the latest version
				composer show // List all installed packages
				composer outdated // Show outdated packages
			</pre>
		
		
		
			<h4><a name="routing" href="#routing">Routing</a></h4>
			<pre class="prettyprint lang-php">Route::get('foo', function(){}); // Basic GET route
				Route::get('foo', [ControllerName::class, 'function']); // GET route to controller method (modern syntax)
				Route::get('foo', 'ControllerName@function'); // GET route to controller method (legacy syntax)
				Route::resource('posts', PostController::class); // RESTful resource routes
				Route::apiResource('posts', PostController::class); // API resource routes (without create/edit)
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
				Route::match(['get', 'post'], 'foo', function(){}); // Match specific verbs
				Route::post('foo', function(){}); // POST route
				Route::put('foo', function(){}); // PUT route
				Route::patch('foo', function(){}); // PATCH route
				Route::delete('foo', function(){}); // DELETE route
				Route::options('foo', function(){}); // OPTIONS route
				Route::resource('foo', FooController::class); // RESTful resource routes
				Route::apiResource('foo', FooController::class); // API resource routes
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

			<h6>Middleware</h6>
			<pre class="prettyprint lang-php">Route::middleware(['auth'])->get('foo', function(){}); // Apply middleware to route
				Route::middleware(['auth', 'verified'])->group(function(){}); // Apply middleware to route group
				Route::get('foo', function(){})->middleware('auth'); // Apply middleware using method
				Route::get('foo', function(){})->withoutMiddleware([Middleware::class]); // Exclude middleware
				Route::middleware(['auth:sanctum'])->group(function(){}); // Apply middleware with parameter
			</pre>

			<h6>Named Routes</h6>
			<pre class="prettyprint lang-php">Route::currentRouteName(); // Get current route name
				Route::get('foo/bar', function(){})->name('foobar'); // Name a route (modern syntax)
				Route::get('foo/bar', [FooController::class, 'bar'])->name('foobar'); // Named route with controller
				Route::get('foo/bar', array('as' => 'foobar', function(){})); // Name a route (legacy syntax)
				route('foobar'); // Generate URL to named route
				route('foobar', ['id' => 1]); // Generate URL with parameters
			</pre>

			<h6>Route Prefixing & Grouping</h6>
			<pre class="prettyprint lang-php">Route::prefix('foo')->group(function(){}); // This route group will be accessed via /foo/*
				Route::name('admin.')->group(function(){}); // Prefix all route names in group
				Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){}); // Combined prefixes
				Route::controller(UserController::class)->group(function(){}); // Group routes by controller
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
			<pre class="prettyprint lang-php">Event::dispatch(new OrderShipped($order)); // Fire an event (modern)
				Event::dispatch('order.shipped', [$order]); // Fire an event with string name
				event(new OrderShipped($order)); // Fire event using helper
				Event::listen(OrderShipped::class, [SendShipmentNotification::class, 'handle']); // Listen for an event with class
				Event::listen('order.*', function($eventName, array $data){}); // Listen for wildcard event
				Event::subscribe(UserEventSubscriber::class); // Subscribe to events using a class
				Event::fake(); // Fake events for testing
				Event::fake([OrderShipped::class]); // Fake specific events
				Event::assertDispatched(OrderShipped::class); // Assert event was dispatched
			</pre>
			
			<h4><a name="db" href="#db">DB</a></h4>
			<pre class="prettyprint lang-php">DB::table('users')->get(); // Get all users
				DB::table('users')->where('id', 1)->first(); // Get first user
				DB::table('users')->find(1); // Find by id
				DB::table('users')->value('email'); // Get a single column's value
				DB::table('users')->pluck('name', 'id'); // Get array of values
				DB::table('users')->select('name', 'email')->get(); // Select specific columns
				DB::table('users')->where('votes', '>', 100)->get(); // Where clause
				DB::table('users')->whereBetween('votes', [1, 100])->get(); // Where between
				DB::table('users')->whereIn('id', [1, 2, 3])->get(); // Where in
				DB::table('users')->whereNull('updated_at')->get(); // Where null
				DB::table('users')->orderBy('name', 'desc')->get(); // Order by
				DB::table('users')->latest()->first(); // Get latest record
				DB::table('users')->oldest()->first(); // Get oldest record
				DB::table('users')->skip(10)->take(5)->get(); // Pagination
				DB::table('users')->count(); // Count records
				DB::table('users')->max('votes'); // Get max value
				DB::table('users')->insert(['email' => 'john@example.com', 'name' => 'John']); // Insert
				DB::table('users')->insertGetId(['email' => 'john@example.com']); // Insert and get ID
				DB::table('users')->where('id', 1)->update(['votes' => 1]); // Update
				DB::table('users')->where('id', 1)->delete(); // Delete
				DB::table('users')->truncate(); // Truncate table
				DB::transaction(function(){ /* code here */ }); // Transaction
				DB::beginTransaction(); // Begin transaction
				DB::commit(); // Commit transaction
				DB::rollBack(); // Rollback transaction
				DB::listen(function($query){ /* code here */ }); // Listen for queries
			</pre>

			<h4><a name="eloquent" href="#eloquent">Eloquent</a></h4>
			<pre class="prettyprint lang-php">User::create(['name' => 'John']); // Create new model
				User::firstOrCreate(['email' => 'john@example.com']); // Create if doesn't exist
				User::updateOrCreate(['email' => 'john@example.com'], ['name' => 'John']); // Update or create
				User::destroy(1); // Destroy model with id 1
				User::destroy([1, 2, 3]); // Destroy models with id 1,2,3
				User::all(); // Get all models
				User::find(1); // Find model with id 1
				User::findOrFail(1); // Find model with id 1 or throw 404
				User::findOr(1, function(){}); // Find or execute callback
				User::firstWhere('email', 'john@example.com'); // Get first matching record
				User::where('active', 1)->get(); // Get models with where condition
				User::where('active', 1)->first(); // Get first row with where condition
				User::where('active', 1)->firstOrFail(); // Get first row or throw 404
				User::where('active', 1)->sole(); // Get single record or throw exception
				User::where('active', 1)->count(); // Get row count
				User::where('active', 1)->delete(); // Delete with where condition
				User::latest()->get(); // Order by created_at desc
				User::oldest()->get(); // Order by created_at asc
				User::with('posts')->get(); // Eager load relationship
				User::with(['posts', 'comments'])->get(); // Eager load multiple relationships
				User::withCount('posts')->get(); // Load relationship counts
				User::has('posts')->get(); // Only users with posts
				User::doesntHave('posts')->get(); // Only users without posts
				User::whereHas('posts', function($q){ $q->where('active', 1); })->get(); // Filter by relationship
				User::take(10)->get(); // Get 10 models
				User::skip(10)->take(5)->get(); // Skip 10 and take 5
				User::paginate(15); // Paginate results
				User::simplePaginate(15); // Simple pagination
				User::cursor()->each(function($user){}); // Lazy load large datasets
				User::chunk(100, function($users){}); // Process in chunks
				User::lazy()->each(function($user){}); // Lazy collection
			</pre>

			<h6>Soft Delete</h6>
			<pre class="prettyprint lang-php">User::withTrashed()->get(); // Get all models including soft deleted
				User::withTrashed()->where('id', 1)->restore(); // Restore soft deleted model
				User::onlyTrashed()->get(); // Get only soft deleted models
				User::where('id', 1)->forceDelete(); // Permanently delete model
				$user->trashed(); // Check if model is soft deleted
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
			<pre class="prettyprint lang-php">Mail::to('user@example.com')->send(new OrderShipped($order)); // Send email (modern)
				Mail::to($user)->send(new OrderShipped($order)); // Send to user model
				Mail::to($user)->cc($moreUsers)->bcc($evenMoreUsers)->send(new OrderShipped($order)); // CC and BCC
				Mail::to($user)->queue(new OrderShipped($order)); // Queue email
				Mail::to($user)->later(now()->addMinutes(10), new OrderShipped($order)); // Queue with delay
				Mail::send('emails.welcome', $data, function($message){}); // Send with view (legacy)
				Mail::send(['html.view', 'text.view'], $data, $callback); // Send multipart email
				Mail::fake(); // Fake emails for testing
				Mail::assertSent(OrderShipped::class); // Assert email was sent
				Mail::assertQueued(OrderShipped::class); // Assert email was queued
			</pre>

			<h4><a name="queues" href="#queues">Queues</a></h4>
			<pre class="prettyprint lang-php">ProcessPodcast::dispatch($podcast); // Dispatch a job (modern)
				ProcessPodcast::dispatch($podcast)->onQueue('processing'); // Dispatch to specific queue
				ProcessPodcast::dispatch($podcast)->delay(now()->addMinutes(10)); // Dispatch with delay
				ProcessPodcast::dispatchSync($podcast); // Dispatch synchronously
				ProcessPodcast::dispatchIf($condition, $podcast); // Conditional dispatch
				ProcessPodcast::dispatchUnless($condition, $podcast); // Conditional dispatch
				Bus::chain([new ProcessPodcast, new ReleasePodcast])->dispatch(); // Chain jobs
				Bus::batch([new ProcessPodcast, new ReleasePodcast])->dispatch(); // Batch jobs
				Queue::fake(); // Fake queue for testing
				Queue::assertPushed(ProcessPodcast::class); // Assert job was pushed
				php artisan queue:work // Process jobs on default queue
				php artisan queue:work --queue=high,default // Process specific queues
				php artisan queue:listen // Listen to queue
				php artisan queue:restart // Restart queue workers
				php artisan queue:retry all // Retry all failed jobs
				php artisan queue:failed // List failed jobs
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
			<h4><a name="input" href="#input">Request & Input</a></h4>
			<pre class="prettyprint lang-php">$request->input('key'); // Get input value
				$request->input('key', 'default'); // Get input with default value
				$request->get('key'); // Alternative to input()
				$request->has('key'); // Check if input exists
				$request->hasAny(['name', 'email']); // Check if any input exists
				$request->filled('key'); // Check if input exists and is not empty
				$request->missing('key'); // Check if input is missing
				$request->all(); // Get all input values
				$request->only('foo', 'bar'); // Get only foo and bar inputs
				$request->only(['foo', 'bar']); // Get only foo and bar inputs (array)
				$request->except('foo'); // Get all except 'foo'
				$request->except(['foo', 'bar']); // Get all except 'foo' and 'bar'
				$request->boolean('archived'); // Get boolean value
				$request->integer('count'); // Get integer value
				$request->float('amount'); // Get float value
				$request->date('birthday'); // Get date value
				$request->collect('users'); // Get input as collection
				$request->whenHas('name', function($value){}); // Execute callback if input exists
			</pre>

			<h6>Session Input (flash)</h6>
			<pre class="prettyprint lang-php">$request->flash(); // Flash input to the session
				$request->flashOnly('foo', 'bar'); // Flash only foo and bar inputs
				$request->flashExcept('password'); // Flash all inputs except password
				$request->old('key', 'default'); // Get old input value
				old('key', 'default'); // Get old input using helper
			</pre>

			<h6>Files</h6>
			<pre class="prettyprint lang-php">$request->file('photo'); // Get uploaded file
				$request->hasFile('photo'); // Check if file was uploaded
				$request->file('photo')->isValid(); // Check if file is valid
				$request->file('photo')->path(); // Get file path
				$request->file('photo')->extension(); // Get file extension
				$request->file('photo')->getClientOriginalName(); // Get original filename
				$request->file('photo')->getSize(); // Get file size
				$request->file('photo')->getMimeType(); // Get MIME type
				$request->file('photo')->store('photos'); // Store file
				$request->file('photo')->storeAs('photos', 'filename.jpg'); // Store with custom name
				$request->file('photo')->storePublicly('photos', 's3'); // Store publicly on disk
				$request->file('photo')->move($path, $name); // Move file
			</pre>

			<h4><a name="cache" href="#cache">Cache</a></h4>
			<pre class="prettyprint lang-php">Cache::get('key'); // Get cache
				Cache::get('key', 'default'); // Get cache with default value
				Cache::get('key', function(){ return 'default'; }); // Get cache with Closure default
				Cache::pull('key'); // Get and delete cache
				Cache::put('key', 'value', $seconds); // Set cache with TTL in seconds
				Cache::put('key', 'value', now()->addMinutes(10)); // Set cache with DateTime
				Cache::add('key', 'value', $seconds); // Set cache if not exists
				Cache::forever('key', 'value'); // Set cache forever
				Cache::remember('key', $seconds, function(){ return 'value'; }); // Get or set cache
				Cache::rememberForever('key', function(){ return 'value'; }); // Get or set cache forever
				Cache::forget('key'); // Delete cache by key
				Cache::flush(); // Clear all cache
				Cache::has('key'); // Check if cache exists
				Cache::missing('key'); // Check if cache doesn't exist
				Cache::increment('key'); // Increment cache value
				Cache::increment('key', $amount); // Increment by amount
				Cache::decrement('key'); // Decrement cache value
				Cache::decrement('key', $amount); // Decrement by amount
				Cache::tags(['people', 'artists'])->put('John', $john, $seconds); // Tagged cache
				Cache::tags(['people', 'artists'])->get('John'); // Get tagged cache
				Cache::tags('people')->flush(); // Flush tagged cache
				cache(['key' => 'value'], $seconds); // Cache helper
				cache()->remember('users', $seconds, fn() => DB::table('users')->get()); // Cache helper with remember
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
			<pre class="prettyprint lang-php">$request->path(); // Get request path
				$request->url(); // Get full URL without query string
				$request->fullUrl(); // Get full URL with query string
				$request->fullUrlWithQuery(['bar' => 'baz']); // Get full URL with additional query
				$request->is('admin/*'); // Check if request matches pattern
				$request->routeIs('admin.*'); // Check if route name matches
				$request->segment(1); // Get URL segment
				$request->header('X-Header-Name'); // Get request header
				$request->bearerToken(); // Get bearer token from Authorization header
				$request->ip(); // Get client IP address
				$request->ips(); // Get all client IPs
				$request->server('PATH_INFO'); // Get server variable
				$request->ajax(); // Check if request is AJAX
				$request->wantsJson(); // Check if request wants JSON
				$request->expectsJson(); // Check if request expects JSON response
				$request->secure(); // Check if request is HTTPS
				$request->method(); // Get HTTP method
				$request->isMethod('post'); // Check HTTP method
				$request->user(); // Get authenticated user
			</pre>

			<h4><a name="responses" href="#responses">Responses</a></h4>
			<pre class="prettyprint lang-php">return response($content); // Create response
				return response($content, 200); // Create response with status code
				return response()->json(['name' => 'John']); // Create JSON response
				return response()->json(['name' => 'John'], 200); // JSON with status code
				return response()->json(['name' => 'John'])->header('X-Header', 'Value'); // JSON with header
				return response()->download($pathToFile); // File download response
				return response()->download($pathToFile, $name, $headers); // Download with custom name
				return response()->streamDownload(function(){}, $name); // Stream download
				return response()->file($pathToFile); // Display file in browser
				return response()->view('hello', $data, 200); // Response with view
				return response()->noContent(); // 204 No Content response
				return response()->noContent(200); // Empty response with status
				$response = response($content); // Create response
				$response->header('Content-Type', 'application/json'); // Add header
				$response->withHeaders(['X-Header-One' => 'Value']); // Add multiple headers
				$response->cookie('name', 'value', $minutes); // Attach cookie
				return $response; // Return response
			</pre>

			<h4><a name="redirects" href="#redirects">Redirects</a></h4>
			<pre class="prettyprint lang-php">return redirect('home'); // Redirect to URI
				return redirect('/'); // Redirect to home
				return redirect()->route('route.name'); // Redirect to named route
				return redirect()->route('profile', ['id' => 1]); // Redirect to route with parameters
				return redirect()->action([UserController::class, 'index']); // Redirect to controller action
				return redirect()->action([UserController::class, 'profile'], ['id' => 1]); // With parameters
				return redirect()->back(); // Redirect to previous page
				return back(); // Redirect to previous page (helper)
				return redirect('form')->withInput(); // Redirect with all input
				return redirect('form')->withInput($request->except('password')); // Redirect with input except password
				return redirect('form')->with('status', 'Profile updated!'); // Redirect with flash data
				return redirect('form')->withErrors($validator); // Redirect with validation errors
				return to_route('profile', ['id' => 1]); // Named route helper
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
			<h6>Passwords (Hashing)</h6>
			<pre class="prettyprint lang-php">Hash::make('secretpassword'); // Generate hashed password
				Hash::check('secretpassword', $hashedPassword); // Check hashed password
				Hash::needsRehash($hashedPassword); // Check if password needs rehashing
				bcrypt('secretpassword'); // Hash password using bcrypt helper
			</pre>
			<h6>Authentication</h6>
			<pre class="prettyprint lang-php">Auth::check(); // Check if user is authenticated
				Auth::user(); // Get authenticated user
				Auth::id(); // Get authenticated user's ID
				$request->user(); // Get authenticated user from request
				Auth::attempt(['email' => $email, 'password' => $password]); // Attempt login
				Auth::attempt($credentials, $remember = true); // Attempt login with remember
				Auth::once($credentials); // Log in for single request
				Auth::login($user); // Log in user by model
				Auth::login($user, $remember = true); // Log in with remember
				Auth::loginUsingId(1); // Log in user by ID
				Auth::loginUsingId(1, $remember = true); // Log in by ID with remember
				Auth::logout(); // Log out user
				$request->session()->invalidate(); // Invalidate session
				$request->session()->regenerateToken(); // Regenerate CSRF token
				Auth::viaRemember(); // Check if user was authenticated via remember cookie
				Auth::guard('admin')->check(); // Use specific guard
				auth()->user(); // Get authenticated user using helper
			</pre>
			<h6>Password Reset</h6>
			<pre class="prettyprint lang-php">Password::sendResetLink(['email' => $email]); // Send password reset link
				Password::reset($credentials, function($user, $password){}); // Reset password
			</pre>
			<h6>Encryption</h6>
			<pre class="prettyprint lang-php">Crypt::encryptString('secretstring'); // Encrypt string
				Crypt::decryptString($encryptedString); // Decrypt string
				encrypt('secretstring'); // Encrypt using helper
				decrypt($encryptedString); // Decrypt using helper
			</pre>

			<h4><a name="validation" href="#validation">Validation</a></h4>
			<pre class="prettyprint lang-php">$request->validate([ // Validate in controller
					'title' => 'required|unique:posts|max:255',
					'body' => 'required',
				]);
				$validated = $request->validated(); // Get validated data
				$request->validate([ // Array syntax for rules
					'title' => ['required', 'max:255'],
					'body' => ['required'],
				]);
				Validator::make($data, [ // Manual validation
					'title' => 'required|unique:posts|max:255',
					'body' => 'required',
				]);
				$validator = Validator::make($data, $rules); // Create validator
				if ($validator->fails()) {} // Check if validation fails
				$validator->errors(); // Get error messages
				$validator->validated(); // Get validated data
				$validator->safe()->only(['name', 'email']); // Get safe validated data
				Validator::extend('foo', function($attribute, $value, $params){}); // Custom validator
				Validator::extend('foo', [FooValidator::class, 'validate']); // Custom validator class
			</pre>

			<h6>Validation Rules</h6>
			<pre class="prettyprint lang-php">accepted // Must be "yes", "on", 1, or true
				accepted_if:anotherfield,value // Accepted if another field equals value
				active_url // Must be a valid URL according to DNS
				after:date // Must be a value after a given date
				after_or_equal:date // Must be after or equal to date
				alpha // Must be entirely alphabetic characters
				alpha_dash // May have alpha-numeric characters, dashes and underscores
				alpha_num // Must be entirely alpha-numeric characters
				array // Must be an array
				bail // Stop running validation rules after first failure
				before:date // Must be a value preceding the given date
				before_or_equal:date // Must be before or equal to date
				between:min,max // Must have a size between min and max
				boolean // Must be a boolean value
				confirmed // Must have a matching foo_confirmation field
				current_password // Must match the authenticated user's password
				date // Must be a valid date
				date_equals:date // Must be equal to the given date
				date_format:format // Must match the given date format
				declined // Must be "no", "off", 0, or false
				different:field // Must be different from the given field
				digits:value // Must be numeric and have exact length
				digits_between:min,max // Must have length between min and max
				dimensions:min_width=100 // Image dimensions must match constraints
				distinct // Array values must be unique
				email // Must be formatted as an e-mail address
				ends_with:foo,bar // Must end with one of the given values
				enum:Enum\Class // Must be valid enum case
				exists:table,column // Must exist in database table
				file // Must be a successfully uploaded file
				filled // Must not be empty when present
				gt:field // Must be greater than the given field
				gte:field // Must be greater than or equal to the given field
				image // Must be an image (jpeg, png, bmp, gif, svg, or webp)
				in:foo,bar,baz // Must be included in the given list
				in_array:anotherfield.* // Must exist in another field's values
				integer // Must be an integer
				ip // Must be an IP address
				ipv4 // Must be an IPv4 address
				ipv6 // Must be an IPv6 address
				json // Must be a valid JSON string
				lt:field // Must be less than the given field
				lte:field // Must be less than or equal to the given field
				max:value // Must be less than or equal to maximum value
				max_digits:value // Must have maximum number of digits
				mimes:foo,bar,baz // File must have a MIME type corresponding to extensions
				mimetypes:text/plain // File must match given MIME types
				min:value // Must be greater than or equal to minimum value
				min_digits:value // Must have minimum number of digits
				multiple_of:value // Must be a multiple of value
				not_in:foo,bar,baz // Must not be included in the given list
				not_regex:pattern // Must not match the given regular expression
				nullable // May be null
				numeric // Must be numeric
				password // Must match the authenticated user's password
				present // Must be present in input data
				prohibited // Must not be present
				prohibited_if:anotherfield,value // Prohibited if another field equals value
				prohibited_unless:anotherfield,value // Prohibited unless another field equals value
				prohibits:anotherfield // Must not be present with another field
				regex:pattern // Must match the given regular expression
				required // Must be present and not empty
				required_if:anotherfield,value // Required if another field equals value
				required_unless:anotherfield,value // Required unless another field equals value
				required_with:foo,bar // Required if any other fields are present
				required_with_all:foo,bar // Required if all other fields are present
				required_without:foo,bar // Required if any other fields are not present
				required_without_all:foo,bar // Required if all other fields are not present
				same:field // Must match the given field
				size:value // Must have a size matching the given value
				starts_with:foo,bar // Must start with one of the given values
				string // Must be a string
				timezone // Must be a valid timezone identifier
				unique:table,column // Must be unique in database table
				uploaded // Must be a successfully uploaded file
				url // Must be a valid URL
				uuid // Must be a valid UUID

			</pre>
			
		</div>
		<div class="large-4 columnsi code-column">
			<h4><a name="views" href="#views">Views</a></h4>
			<pre class="prettyprint lang-php">return view('welcome'); // Return view
				return view('welcome', ['name' => 'John']); // Return view with data
				return view('welcome')->with('name', 'John'); // Return view with data using with
				return view('admin.profile', $data); // Nested view directory
				view()->share('key', 'value'); // Share data with all views
				View::share('key', 'value'); // Share using facade
				view()->composer('profile', function($view){}); // View composer
				View::composer('profile', function($view){}); // View composer using facade
				View::composer(['profile', 'dashboard'], function($view){}); // Multiple views composer
				View::composer('*', function($view){}); // Global view composer
				View::composer('profile', ProfileComposer::class); // Class based composer
				View::creator('profile', function($view){}); // View creator
				View::exists('emails.customer'); // Check if view exists
				view()->first(['custom.admin', 'admin'], $data); // First existing view
			</pre>

			<h4><a name="blade" href="#blade">Blade Templates</a></h4>
			<pre class="prettyprint lang-php">@extends('layout.name') // Extend layout
				@section('name') // Start section
				@endsection // End section
				@yield('name') // Display section in template
				@yield('name', 'Default Content') // Display section with default
				@include('view.name') // Include view file
				@include('view.name', ['key' => 'value']) // Include view with data
				@includeIf('view.name') // Include if view exists
				@includeWhen($condition, 'view.name') // Include when condition is true
				@includeFirst(['custom.admin', 'admin'], ['key' => 'value']) // Include first existing view
				@component('components.alert') // Start component
				@endcomponent // End component
				@props(['type', 'message']) // Define component props
				&lt;x-alert type="error" :message="$message"/&gt; // Blade component syntax
				@lang('messages.name') // Localization
				@choice('messages.name', 1) // Pluralization
				{{ $var }} // Display content (escaped)
				{!! $var !!} // Display unescaped content
				{{ $var ?? 'default' }} // Display with default value
				@{{ javascript }} // Ignore Blade and render as-is
				@verbatim {{ Vue syntax }} @endverbatim // Ignore Blade for entire block
				{{-- Blade Comment --}} // Blade comment
				@if($condition) // If statement
				@elseif($condition) // Else if
				@else // Else condition
				@endif // End if
				@unless($condition) // Unless statement
				@endunless // End unless
				@isset($var) // Check if variable is set
				@endisset // End isset
				@empty($var) // Check if variable is empty
				@endempty // End empty
				@auth // Check if user is authenticated
				@endauth // End auth
				@guest // Check if user is guest
				@endguest // End guest
				@production // Check if in production
				@endproduction // End production
				@env('local') // Check environment
				@endenv // End env
				@for($i = 0; $i < 10; $i++) // For loop
				@endfor // End for
				@foreach($users as $user) // Foreach loop
				@endforeach // End foreach
				@forelse($users as $user) // Foreach with empty
				@empty // Empty clause
				@endforelse // End forelse
				@while($condition) // While loop
				@endwhile // End while
				@continue // Continue loop
				@break // Break loop
				@php // PHP code block
				@endphp // End PHP block
				@json($array) // Convert to JSON
				@error('email') // Display validation error
				@enderror // End error
				@csrf // CSRF token field
				@method('PUT') // HTTP method field
				@stack('scripts') // Define stack placeholder
				@push('scripts') // Push to stack
				@endpush // End push
				@prepend('scripts') // Prepend to stack
				@endprepend // End prepend
				$loop->index // Loop index (0-based)
				$loop->iteration // Loop iteration (1-based)
				$loop->first // First iteration
				$loop->last // Last iteration
				$loop->count // Total items
				$loop->depth // Nesting level
			</pre>

			<h4><a name="forms" href="#forms">Forms & HTML</a></h4>
			<pre class="prettyprint lang-php">&lt;form method="POST" action="/profile"&gt; // Basic form
					@csrf // CSRF token (required for POST/PUT/PATCH/DELETE)
				&lt;/form&gt;
				&lt;form method="POST" action="/profile"&gt; // Form with method spoofing
					@csrf
					@method('PUT') // Method spoofing for PUT/PATCH/DELETE
				&lt;/form&gt;
				&lt;input type="text" name="name" value="{{ old('name') }}"&gt; // Input with old value
				&lt;input type="text" name="email" value="{{ old('email', $user-&gt;email) }}"&gt; // With default
				@error('email') // Display validation error
					&lt;span class="error"&gt;{{ $message }}&lt;/span&gt;
				@enderror
				&lt;label for="name"&gt;Name&lt;/label&gt; // Label
				&lt;input type="text" name="name" id="name"&gt; // Text input
				&lt;input type="password" name="password"&gt; // Password input
				&lt;input type="email" name="email"&gt; // Email input
				&lt;input type="file" name="avatar"&gt; // File input
				&lt;input type="checkbox" name="active" value="1"&gt; // Checkbox
				&lt;input type="radio" name="role" value="admin"&gt; // Radio button
				&lt;select name="country"&gt; // Select dropdown
					&lt;option value="us"&gt;United States&lt;/option&gt;
				&lt;/select&gt;
				&lt;select name="country"&gt; // Select with old value
					&lt;option value="us" {{ old('country') == 'us' ? 'selected' : '' }}&gt;US&lt;/option&gt;
				&lt;/select&gt;
				&lt;textarea name="bio"&gt;{{ old('bio') }}&lt;/textarea&gt; // Textarea
				&lt;button type="submit"&gt;Submit&lt;/button&gt; // Submit button
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