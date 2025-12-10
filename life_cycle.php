<div class="large-12 columns" style="margin-bottom: 30px;">
			<h4 style="text-align: center; color: #e74c3c; margin-bottom: 20px;">
				<a name="app-lifecycle" href="#app-lifecycle">🔄 Laravel Application Life Cycle / লারাভেল অ্যাপ্লিকেশন লাইফ সাইকেল</a>
			</h4>
			
			<!-- Visual Flow Diagram -->
			<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
				<pre style="color: white; margin: 0; line-height: 1.8; font-size: 13px; font-family: 'Courier New', monospace;">
   ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
   ┃                    🌐 HTTP REQUEST / HTTP রিকোয়েস্ট                    
   ┃                         (User Browser / ব্যবহারকারী)                   
   ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  📂 STEP 1: Entry Point / প্রবেশ বিন্দু                
        ║  File: public/index.php                               
        ║  • Loads Composer autoloader                          
        ║  • Autoloader লোড করে                                 
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  🏗️  STEP 2: Bootstrap / বুটস্ট্র্যাপ                 
        ║  File: bootstrap/app.php                              
        ║  • Creates Application instance                       
        ║  • অ্যাপ্লিকেশন ইনস্ট্যান্স তৈরি করে                    
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  ⚙️  STEP 3: HTTP Kernel / HTTP কার্নেল               
        ║  File: app/Http/Kernel.php                            
        ║  • Handles incoming request                           
        ║  • আগত রিকোয়েস্ট হ্যান্ডেল করে                         
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  🔌 STEP 4: Service Providers / সার্ভিস প্রোভাইডার    
        ║  File: config/app.php                                 
        ║  • Register & Boot providers                          
        ║  • Database, Cache, Session, etc                      
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  🛣️  STEP 5: Router / রাউটার                         
        ║  Files: routes/web.php, routes/api.php                
        ║  • Matches URL to Route                               
        ║  • URL কে রাউটের সাথে মিলায়                           
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  🔐 STEP 6: Middleware (Before) / মিডলওয়্যার (আগে)   
        ║  • Authentication / প্রমাণীকরণ                        
        ║  • CSRF Protection / CSRF সুরক্ষা                     
        ║  • Session / সেশন                                      
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  🎮 STEP 7: Controller / কন্ট্রোলার                   
        ║  File: app/Http/Controllers/                          
        ║  • Execute business logic                             
        ║  • ব্যবসায়িক লজিক সম্পাদন করে                         
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  💾 STEP 8: Model/Database / মডেল/ডাটাবেস            
        ║  Files: app/Models/, database/                        
        ║  • Interact with database                             
        ║  • ডাটাবেসের সাথে ইন্টারঅ্যাক্ট করে                    
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  🖼️  STEP 9: View / ভিউ                               
        ║  Files: resources/views/                              
        ║  • Render HTML/JSON Response                          
        ║  • HTML/JSON রেসপন্স রেন্ডার করে                        
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
        ╔════════════════════════════════════════════════════════╗
        ║  🔐 STEP 10: Middleware (After) / মিডলওয়্যার (পরে)   
        ║  • Modify response                                    
        ║  • রেসপন্স পরিবর্তন করে                                
        ╚════════════════════════════════════════════════════════╝
                                    │
                                    ▼
   ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┻━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
   ┃                ✅ RESPONSE SENT / রেসপন্স পাঠানো হয়েছে                 
   ┃                    (Back to User Browser / ব্যবহারকারীর কাছে)          
   ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛
				</pre>
			</div>

			<!-- Detailed Explanation Grid -->
			<div class="row">
				<div class="large-6 columns">
					<div style="background: #ecf0f1; padding: 20px; border-radius: 8px; margin-bottom: 15px; border-left: 5px solid #3498db;">
						<h6 style="color: #2c3e50; margin-top: 0;">📖 Complete Flow Summary / সম্পূর্ণ প্রবাহ সারসংক্ষেপ</h6>
						<p style="font-size: 13px; line-height: 1.8; color: #555;">
							<strong>1.</strong> Request enters through <code>public/index.php</code><br>
							<span style="color: #16a085; margin-left: 20px;">রিকোয়েস্ট <code>public/index.php</code> এর মাধ্যমে প্রবেশ করে</span><br><br>
							
							<strong>2.</strong> Application bootstraps via <code>bootstrap/app.php</code><br>
							<span style="color: #16a085; margin-left: 20px;">অ্যাপ্লিকেশন <code>bootstrap/app.php</code> এর মাধ্যমে বুটস্ট্র্যাপ হয়</span><br><br>
							
							<strong>3.</strong> HTTP Kernel handles the request<br>
							<span style="color: #16a085; margin-left: 20px;">HTTP কার্নেল রিকোয়েস্ট হ্যান্ডেল করে</span><br><br>
							
							<strong>4.</strong> Service Providers register services<br>
							<span style="color: #16a085; margin-left: 20px;">সার্ভিস প্রোভাইডার সেবা নিবন্ধন করে</span><br><br>
							
							<strong>5.</strong> Router matches URL to route<br>
							<span style="color: #16a085; margin-left: 20px;">রাউটার URL কে রাউটের সাথে মিলায়</span><br><br>
							
							<strong>6.</strong> Middleware filters the request<br>
							<span style="color: #16a085; margin-left: 20px;">মিডলওয়্যার রিকোয়েস্ট ফিল্টার করে</span><br><br>
							
							<strong>7.</strong> Controller executes logic<br>
							<span style="color: #16a085; margin-left: 20px;">কন্ট্রোলার লজিক সম্পাদন করে</span><br><br>
							
							<strong>8.</strong> Model interacts with database<br>
							<span style="color: #16a085; margin-left: 20px;">মডেল ডাটাবেসের সাথে ইন্টারঅ্যাক্ট করে</span><br><br>
							
							<strong>9.</strong> View renders the response<br>
							<span style="color: #16a085; margin-left: 20px;">ভিউ রেসপন্স রেন্ডার করে</span><br><br>
							
							<strong>10.</strong> Response sent back to user<br>
							<span style="color: #16a085; margin-left: 20px;">রেসপন্স ব্যবহারকারীর কাছে ফেরত পাঠানো হয়</span>
						</p>
					</div>
				</div>
				<div class="large-6 columns">
					<div style="background: #fff3cd; padding: 20px; border-radius: 8px; margin-bottom: 15px; border-left: 5px solid #ffc107;">
						<h6 style="color: #856404; margin-top: 0;">⚡ Key Components / মূল উপাদান</h6>
						<ul style="font-size: 13px; line-height: 1.8; color: #555;">
							<li><strong>Kernel:</strong> Heart of the application / অ্যাপ্লিকেশনের হৃদয়</li>
							<li><strong>Service Providers:</strong> Bootstrap services / সেবা চালু করে</li>
							<li><strong>Middleware:</strong> HTTP filters / HTTP ফিল্টার</li>
							<li><strong>Router:</strong> URL dispatcher / URL বিতরণকারী</li>
							<li><strong>Controller:</strong> Logic handler / লজিক হ্যান্ডলার</li>
							<li><strong>Model:</strong> Database ORM / ডাটাবেস ORM</li>
							<li><strong>View:</strong> Template engine / টেমপ্লেট ইঞ্জিন</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- User Request Life Cycle from Browser -->
		<div class="large-12 columns" style="margin-bottom: 30px;">
			<h4 style="text-align: center; color: #2980b9; margin-bottom: 20px;">
				<a name="user-request-lifecycle" href="#user-request-lifecycle">🌐 Laravel User Request Life Cycle from Browser / ব্রাউজার থেকে লারাভেল রিকোয়েস্ট লাইফ সাইকেল</a>
			</h4>
			
			<!-- Complete Browser to Response Flow -->
			<div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 30px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
				<pre style="color: white; margin: 0; line-height: 1.7; font-size: 12px; font-family: 'Courier New', monospace;">
╔═══════════════════════════════════════════════════════════════════════════════╗
║                         👤 USER / BROWSER / ব্যবহারকারী                        
║                    (Chrome, Firefox, Safari, Edge, etc.)                     
╚═══════════════════════════════════════════════════════════════════════════════╝
                                        │
                    Types URL: http://example.com/products
                    URL টাইপ করে: http://example.com/products
                                        │
                                        ▼
        ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
        ┃              🌍 INTERNET / ইন্টারনেট (HTTP/HTTPS)              
        ┃                   DNS Resolution / DNS রেজোলিউশন             
        ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛
                                        │
                                        ▼
        ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
        ┃              🖥️  WEB SERVER / ওয়েব সার্ভার                     
        ┃              (Apache, Nginx, etc.)                            
        ┃              Port: 80 (HTTP) or 443 (HTTPS)                   
        ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛
                                        │
                            Routes to Laravel Project
                            লারাভেল প্রজেক্টে রাউট করে
                                        │
                                        ▼
╔═══════════════════════════════════════════════════════════════════════════════╗
║                   📂 LARAVEL APPLICATION / লারাভেল অ্যাপ্লিকেশন               
╚═══════════════════════════════════════════════════════════════════════════════╝
                                        │
                                        ▼
                        ┌───────────────────────────┐
                        │  1️⃣  public/index.php     
                        │  Entry Point / প্রবেশ পথ  
                        │  • Autoloader            
                        │  • Bootstrap              
                        └─────────────┬─────────────┘
                                      │
                                      ▼
                        ┌───────────────────────────┐
                        │  2️⃣  HTTP Kernel          
                        │  app/Http/Kernel.php     
                        │  • Global Middleware      
                        │  • Route Middleware       
                        └─────────────┬─────────────┘
                                      │
                                      ▼
                        ┌───────────────────────────┐
                        │  3️⃣  Service Providers    
                        │  config/app.php          
                        │  • Database               
                        │  • Cache                  
                        │  • Session                
                        └─────────────┬─────────────┘
                                      │
                                      ▼
                        ┌───────────────────────────┐
                        │  4️⃣  Router               
                        │  routes/web.php          
                        │  Match: GET /products     
                        │  মিল: GET /products       
                        └─────────────┬─────────────┘
                                      │
                                      ▼
                        ┌───────────────────────────┐
                        │  5️⃣  Middleware (Before)  
                        │  • Authentication         
                        │  • CSRF Token             
                        │  • Session Start          
                        └─────────────┬─────────────┘
                                      │
                                      ▼
                        ┌───────────────────────────┐
                        │  6️⃣  Controller           
                        │  ProductController@index 
                        │  • Business Logic         
                        │  • Data Processing        
                        └─────────────┬─────────────┘
                                      │
                                      ▼
                        ┌───────────────────────────┐
                        │  7️⃣  Model (Eloquent ORM) 
                        │  Product::all()           
                        │  • Database Query         
                        │  • Data Retrieval         
                        └─────────────┬─────────────┘
                                      │
                    Query Database    │    Return Data
                    ডাটাবেস কোয়েরি     │    ডাটা রিটার্ন
                                      │
                        ┌─────────────▼─────────────┐
                        │  💾 DATABASE              
                        │  MySQL, PostgreSQL, etc.  
                        │  products table           
                        └─────────────┬─────────────┘
                                      │
                            Data Retrieved
                            ডাটা পাওয়া গেছে
                                      │
                                      ▼
                        ┌───────────────────────────┐
                        │  8️⃣  View (Blade)         
                        │  products/index.blade.php
                        │  • HTML Template          
                        │  • Data Binding           
                        └─────────────┬─────────────┘
                                      │
                                      ▼
                        ┌───────────────────────────┐
                        │  9️⃣  Response Object      
                        │  • HTML Content           
                        │  • HTTP Headers           
                        │  • Status Code: 200       
                        └─────────────┬─────────────┘
                                      │
                                      ▼
                        ┌───────────────────────────┐
                        │  🔟 Middleware (After)    
                        │  • Compress Response      
                        │  • Add Headers            
                        │  • Cookie Handling        
                        └─────────────┬─────────────┘
                                      │
╔═════════════════════════════════════▼═════════════════════════════════════════╗
║                   📤 RESPONSE SENT / রেসপন্স পাঠানো                           
╚═══════════════════════════════════════════════════════════════════════════════╝
                                      │
                          Through Web Server
                          ওয়েব সার্ভারের মাধ্যমে
                                      │
                                      ▼
        ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
        ┃              🌍 INTERNET / ইন্টারনেট                          
        ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛
                                      │
                                      ▼
╔═══════════════════════════════════════════════════════════════════════════════╗
║                   👤 USER BROWSER DISPLAYS PAGE                               
║                   ব্যবহারকারীর ব্রাউজার পেজ প্রদর্শন করে                      
║                   • HTML Rendered / HTML রেন্ডার হয়েছে                       
║                   • CSS Applied / CSS প্রয়োগ হয়েছে                          
║                   • JavaScript Executed / JavaScript চালু হয়েছে              
╚═══════════════════════════════════════════════════════════════════════════════╝

⏱️  TYPICAL TIME: 50-500ms / সাধারণ সময়: ৫০-৫০০ মিলিসেকেন্ড
				</pre>
			</div>