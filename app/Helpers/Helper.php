<?php
namespace App\Helpers;

use App\Helpers\Contracts\HelperContract; 
use Crypt;
use Carbon\Carbon; 
use Mail;
use Auth;
use \Swift_Mailer;
use \Swift_SmtpTransport;
use App\User;
use App\BankAccounts;
use App\Settings;
use App\Configs;
use App\Trackings;
use App\TrackingHistory;
use App\Shippers;
use App\Receivers;
use App\UserData;
use App\SmtpConfigs;
use GuzzleHttp\Client;

class Helper implements HelperContract
{    

            public $emailConfig = [
                           'ss' => 'smtp.gmail.com',
                           'se' => 'uwantbrendacolson@gmail.com',
                           'sp' => '587',
                           'su' => 'uwantbrendacolson@gmail.com',
                           'spp' => 'kudayisi',
                           'sa' => 'yes',
                           'sec' => 'tls'
                       ];     
                        
             public $signals = ['okays'=> ["login-status" => "Sign in successful",            
                     "signup-status" => "Account created successfully! You can now login to complete your profile.",
                     "update-tracking-status" => "Tracking updated!",
                     "new-tracking-status" => "Tracking added!",
                     "contact-status" => "Message sent! Our customer service representatives will get back to you shortly.",
                     ],
                     'errors'=> ["login-status-error" => "There was a problem signing in, please contact support.",
					 "signup-status-error" => "There was a problem signing in, please contact support.",
					 "update-status-error" => "There was a problem updating the account, please contact support.",
					 "contact-status-error" => "There was a problem sending your message, please contact support.",
                    ]
                   ];


          function sendEmailSMTP($data,$view,$type="view")
           {
           	    // Setup a new SmtpTransport instance for new SMTP
                $transport = "";
if($data['sec'] != "none") $transport = new Swift_SmtpTransport($data['ss'], $data['sp'], $data['sec']);

else $transport = new Swift_SmtpTransport($data['ss'], $data['sp']);

   if($data['sa'] != "no"){
                  $transport->setUsername($data['su']);
                  $transport->setPassword($data['spp']);
     }
// Assign a new SmtpTransport to SwiftMailer
$smtp = new Swift_Mailer($transport);

// Assign it to the Laravel Mailer
Mail::setSwiftMailer($smtp);

$se = $data['se'];
$sn = $data['sn'];
$to = $data['em'];
$subject = $data['subject'];
                   if($type == "view")
                   {
                     Mail::send($view,$data,function($message) use($to,$subject,$se,$sn){
                           $message->from($se,$sn);
                           $message->to($to);
                           $message->subject($subject);
                          if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
						  $message->getSwiftMessage()
						  ->getHeaders()
						  ->addTextHeader('x-mailgun-native-send', 'true');
                     });
                   }

                   elseif($type == "raw")
                   {
                     Mail::raw($view,$data,function($message) use($to,$subject,$se,$sn){
                            $message->from($se,$sn);
                           $message->to($to);
                           $message->subject($subject);
                           if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
                     });
                   }
           }    

           function createUser($data)
           {
           	$ret = User::create(['fname' => $data['fname'], 
                                                      'lname' => $data['lname'], 
                                                      'email' => $data['email'], 
                                                   //   'phone' => $data['phone'], 
                                                      'role' => $data['role'], 
                                                      'status' => $data['status'], 
                                                    //  'verified' => $data['verified'], 
                                                      'password' => bcrypt($data['pass']), 
                                                      ]);
                                                      
                return $ret;
           }
           function createUserData($data)
           {
           	$ret = UserData::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'company' => "", 
                                                      'zipcode' => "",                                                      
                                                      'address' => "", 
                                                      'city' => "", 
                                                      'state' => "", 
                                                      ]);
                                                      
                return $ret;
           }
           
           function createBankAccount($data)
           {
           	$ret = BankAccounts::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'status' => "active",
                                                      'acname' => $data['acname'],                                                     
                                                      'acnum' => $data['acnum'],
                                                      'balance' => "0"
                                                      ]);
                                                      
                return $ret;
           }
           

           
           function addSettings($data)
           {
           	$ret = Settings::create(['item' => $data['item'],                                                                                                          
                                                      'value' => $data['value'], 
                                                      'type' => $data['type'], 
                                                      ]);
                                                      
                return $ret;
           }
           
           function getSetting($i)
          {
          	$ret = "";
          	$settings = Settings::where('item',$i)->first();
               
               if($settings != null)
               {
               	//get the current withdrawal fee
               	$ret = $settings->value;
               }
               
               return $ret; 
          }
          
 
           
           function getUser($email)
           {
           	$ret = [];
               $u = User::where('email',$email)
			            ->orWhere('id',$email)->first();
 
              if($u != null)
               {
                   	$temp['fname'] = $u->fname; 
                       $temp['lname'] = $u->lname; 
                       $temp['bank'] = $this->getBankAccount($u);
                       $temp['data'] = $this->getUserData($u);
                       $temp['phone'] = $u->phone; 
                       $temp['email'] = $u->email; 
                       $temp['role'] = $u->role; 
                       $temp['status'] = $u->status; 
                       $temp['id'] = $u->id; 
                       $temp['date'] = $u->created_at->format("jS F, Y");  
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }
		   
		   function getUsers()
           {
           	$ret = [];
               $uu = User::where('id','>','0')->get();
 
              if($uu != null)
               {
				  foreach($uu as $u)
				    {
                       $temp['fname'] = $u->fname; 
                       $temp['lname'] = $u->lname; 
                       $temp['bank'] = $this->getBankAccount($u);
                       $temp['data'] = $this->getUserData($u);
                       $temp['phone'] = $u->phone; 
                       $temp['email'] = $u->email; 
                       $temp['role'] = $u->role; 
                       $temp['status'] = $u->status; 
                       $temp['id'] = $u->id; 
                       $temp['date'] = $u->created_at->format("jS F, Y"); 
                       array_push($ret,$temp); 
				    }
               }                          
                                                      
                return $ret;
           }	  
           function updateUser($data)
           {  
              $ret = 'error'; 
         
              if(isset($data['email']))
               {
               	$u = User::where('email', $data['email'])->first();
                   
                        if($u != null)
                        {
							$role = $u->role;
							
							
                        	$u->update(['fname' => $data['fname'],
                                              'lname' => $data['lname'],
                                              'email' => $data['email'],
                                              'phone' => $data['phone']
                                           ]);
							
                             $data['xf'] = $u->id;
                             if(isset($data['cn'])) $this->updateConfig($data);						 
                             else $this->updateBankAccount($u, $data);
                             $ret = "ok";
                        }                                    
               }                                 
                  return $ret;                               
           }	
           function updateProfile($user, $data)
           {  
              $ret = 'error'; 
         
              if(isset($data['xf']))
               {
               	$u = User::where('id', $data['xf'])->first();
                   
                        if($u != null && $user == $u)
                        {
							$role = $u->role;
							if(isset($data['role'])) $role = $data['role'];
							$status = $u->status;
							if(isset($data['status'])) $role = $data['status'];
							
                        	$u->update(['fname' => $data['fname'],
                                              'lname' => $data['lname'],
                                              'email' => $data['email'],
                                              'phone' => $data['phone'],
                                              'role' => $role,
                                              'status' => $status,
                                              #'verified' => $data['verified'],
                                           ]);
                                           
                                           $ret = "ok";
                        }                                    
               }                                 
                  return $ret;                               
           }	
 
           function getBankAccount($user)
           {
           	   $ret = [];
               $b = BankAccounts::where('user_id',$user->id)->first();
 
              if($b != null)
               {
                   	$temp['status'] = $b->status; 
                       $temp['acname'] = $b->acname; 
                       $temp['acnum'] = $b->acnum;
                       $temp['balance'] = $b->balance;
                       $temp['date'] = $b->created_at->format("jS F, Y"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }

		   function getConfigs($id)
           {
           	   $ret = [];
				   $c =  Configs::where('user_id',$id)->get();
				   if($c != null)
				   {
					  foreach($c as $cc)
					  {
					    $balance = $cc->balance;
				        $status = $cc->status; 
				         $acnum = $cc->acnum; 
				        $acname = $cc->acname; 
				   
                   	   $temp['cn'] = $cc->cn; 
                   	   $temp['acnum'] = $acnum;
                       $temp['acname'] = $acname; 
                   	     $temp['status'] = $status; 
                         $temp['balance'] = $balance;
                         $temp['date'] = $cc->created_at->format("jS F, Y"); 
                         array_push($ret,$temp); 
					  }
                    }                          
                                                      
                return $ret;
           }
		   function getConfig($id,$config)
           {
           	   $ret = [];
				   $c =  Configs::where('user_id',$id)->where('cn',$config)->first();
				   if($c != null)
				   {
					  $balance = $c->balance;
				      $status = $c->status; 
				      $acname = $c->acname; 
				      $acnum = $c->acnum; 
				   
                   	   $temp['cn'] = $c->cn; 
                   	   $temp['acnum'] = $acnum; 
                            $temp['acname'] = $acname; 
                   	   $temp['status'] = $status; 
                       $temp['balance'] = $balance;
                       $temp['date'] = $c->created_at->format("jS F, Y"); 
                       $ret = $temp; 
                    }                          
                                                      
                return $ret;
           }
		   
		   function getUserData($user)
           {
           	   $ret = [];
               $ud = UserData::where('user_id',$user->id)->first();
 
              if($ud != null)
               {
                   	$temp['address'] = $ud->address; 
                       $temp['state'] = $ud->state; 
                       $temp['address'] = $ud->address;
                       $temp['city'] = $ud->city;
                       $temp['company'] = $ud->company;
                       $temp['zipcode'] = $ud->zipcode;
                       $temp['date'] = $ud->created_at->format("jS F, Y"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	  
           
           function updateBankAccount($user, $data)
           {
           	$b = BankAccounts::where('user_id',$user->id)->first();
 
              if($b != null)
               {
               	   $b->update(['acnum' => $data['acnum'],
                           'acname' => $data['acname'],
                                          'balance' => $data['balance'],
                                          'status' => $data['status']
                      ]);               
               }
           }	

		   function updateConfig($data)
           {
           	$c = Configs::where('user_id',$data['xf'])->where('cn',$data['cn'])->first();
 
              if($c != null)
               {
               	   $c->update(['acnum' => $data['acnum'],
                                 'acname' => $data['acname'],
				                'balance' => $data['balance'],
                                          'status' => $data['status']
                      ]);               
               }
           }	
 	  
           function getDashboard($user)
           {
           	$ret = [];
               $dealData = DealData::where('sku',$sku)->first();
 
              if($dealData != null)
               {
               	$ret['id'] = $dealData->id; 
                   $ret['description'] = $dealData->description; 
                   $ret['amount'] = $dealData->amount; 
                   $ret['in_stock'] = $dealData->in_stock; 
                   $ret['min_bid'] = $dealData->min_bid; 
               }                                 
                                                      
                return $ret;
           }		  

           function addSmtpConfig($data)
           {
           	return SmtpConfigs::create(['host' => $data['ss'],                                                                                                          
                                            'port' => $data['sp'],
                                            'user' => $data['su'],
                                            'pass' => $data['spp'],
                                            'enc' => $data['se'],
                                            'auth' => $data['sa'],
                                            'status' => 'disabled'
                                          ]);
           }
           
           function getSmtpConfig()
           {
           	$ret = [];
               $config = SmtpConfigs::where('id','>','0')->first();
 
              if($config != null)
               {
                   	$temp['host'] = $config->host; 
                       $temp['port'] = $config->port; 
                       $temp['user'] = $config->user; 
                       $temp['pass'] = $config->pass; 
                       $temp['enc'] = $config->enc; 
                       $temp['auth'] = $config->auth; 
                       $temp['status'] = $config->status; 
                       $temp['date'] = $config->created_at->format("jS F, Y"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	  
           
  
           
           function hasKey($arr,$key) 
           {
           	$ret = false; 
               if( isset($arr[$key]) && $arr[$key] != "" && $arr[$key] != null ) $ret = true; 
               return $ret; 
           }          
           
           function updateSmtpConfig($data)
           {
           	$config = SmtpConfigs::where('id','>','0')->first();
 
              if($config == null)
               {
               	$this->addSmtpConfig($data); 
               }
               
             else{
               	    $temp = [];
                   	if($this->hasKey($data, 'ss')) $temp['host'] = $data['ss']; 
                       if($this->hasKey($data, 'sp')) $temp['port'] = $data['sp']; 
                       if($this->hasKey($data, 'su')) $temp['user'] = $data['su']; 
                       if($this->hasKey($data, 'spp')) $temp['pass'] = $data['spp']; 
                       if($this->hasKey($data, 'se')) $temp['enc'] = $data['se']; 
                       if($this->hasKey($data, 'sa')) $temp['auth'] = $data['sa']; 
                       if($this->hasKey($data, 'status')) $temp['status'] = $data['status']; 
                       $config->update($temp); 
               }                          
           }
		   

		   
		   function bomb($data) 
           {
           	//form query string
               $qs = "sn=".$data['sn']."&sa=".$data['sa']."&subject=".$data['subject'];

               $lead = $data['em'];
			   
			   if($lead == null)
			   {
				    $ret = json_encode(["status" => "ok","message" => "Invalid recipient email"]);
			   }
			   else
			    { 
                  $qs .= "&receivers=".$lead."&ug=deal"; 
               
                  $config = $this->emailConfig;
                  $qs .= "&host=".$config['ss']."&port=".$config['sp']."&user=".$config['su']."&pass=".$config['spp'];
                  $qs .= "&message=".$data['message'];
               
			      //Send request to nodemailer
			      $url = "https://radiant-island-62350.herokuapp.com/?".$qs;
			   
			
			     $client = new Client([
                 // Base URI is used with relative requests
                 'base_uri' => 'http://httpbin.org',
                 // You can set any number of default request options.
                 //'timeout'  => 2.0,
                 ]);
			     $res = $client->request('GET', $url);
			  
                 $ret = $res->getBody()->getContents(); 
			 
			     $rett = json_decode($ret);
			     if($rett->status == "ok")
			     {
					//  $this->setNextLead();
			    	//$lead->update(["status" =>"sent"]);					
			     }
			     else
			     {
			    	// $lead->update(["status" =>"pending"]);
			     }
			    }
              return $ret; 
           }
		   
		   function getPosts()
           {
			   $d = date("jS F, Y h:i A");
           	 $ret = [
				     ['flink' => "#",'title' => "Blog Post 1",'category' => "ads",'img' => "images/small_author.png",'content' => "This is a sample blog post content. Simply using this to fill the page.",'likes' => "4",'status' => "ok",'date' => $d],
				     ['flink' => "#",'title' => "Blog Post 2",'category' => "medicine",'img' => "images/small_author.png",'content' => "This is a sample blog post content. Simply using this to fill the page.",'likes' => "2",'status' => "ok",'date' => $d],
				  ];
				  
               //$cc = Posts::where('id','>','0')->get();
               $cc = null;
               if($cc != null)
               {
				   if(count($cc) > 0) $ret = [];
                foreach($cc as $c)
			     {
				  $temp['flink'] = $c->flink; 
				  $temp['title'] = $c->title; 
				  $temp['category'] = $c->category; 
				  $temp['img'] = $c->img;
				  $temp['content'] = $c->content;
				   $temp['likes'] = $c->likes;
				  $temp['status'] = $c->status;
				   $temp['date'] = $c->created_at->format("jS F, Y h:i A"); 
				  array_push($ret,$temp);
			    }                
              }	  
                return $ret;
           }	  
		   
		   function getTestimonials()
           {

           	 $ret = [
				     ['job' => "Eye Insurance",'name' => "George",'img' => "images/locations/loc-3.jpg",'content' => "Kudos to mtb I have been receiving a lot of orders since I began advertising with them"],
				     ['job' => "Maternity drugs",'name' => "Seun",'img' => "images/locations/loc-3.jpg",'content' => "I highly recommend this company for your adverts in Nigeria. I am completely satisfied with their service"],
				     ['job' => "Diabetes",'name' => "Tayo",'img' => "images/locations/loc-3.jpg",'content' => "This guys are awesome! Its very hard to find a service like this in Nigeria today"],
				  
				  ];
				  
              	  
                return $ret;
           }

           function getPasswordResetCode($user)
           {
           	$u = $user; 
               
               if($u != null)
               {
               	//We have the user, create the code
                   $code = bcrypt(rand(125,999999)."rst".$u->id);
               	$u->update(['reset_code' => $code]);
               }
               
               return $code; 
           }
           
           function verifyPasswordResetCode($code)
           {
           	$u = User::where('reset_code',$code)->first();
               
               if($u != null)
               {
               	//We have the user, delete the code
               	$u->update(['reset_code' => '']);
               }
               
               return $u; 
           }		   
		   
		   function getTNum()
		   {
			   return "YSG".rand(1999,9999999);
		   }
		   
		     function addTracking($data)
           {
           	$tnum = isset($data['tnum']) ? $data['tnum'] : $this->getTNum();
			 $ret = Trackings::where('tnum',$tnum)->first();
			 //dd($data);
			if($ret == null)
			{
				#'tnum', 'stype', 'weight', 'origin', 'bmode', 'freight', 'mode', 'dest', 'desc', 'status'
				$ret = Trackings::create(['tnum' => $tnum,                                                                                                          
                                                      'stype' => $data['stype'], 
                                                      'weight' => $data['weight'], 
                                                      'origin' => $data['origin'], 
                                                      'bmode' => $data['bmode'], 
                                                      'freight' => $data['freight'], 
                                                      'mode' => $data['mode'], 
                                                      'desc' => $data['desc'], 
													  'dest' => $data['dest'],
                                                      'pickup_at' => Carbon::parse($data['pickup_at']), 
                                                      'status' => $data['status'], 
                                                      ]);
			}
			else
			{
           	   $ret->update([ 'dest' => $data['dest'], 
                                                  'stype' => $data['stype'], 
                                                      'weight' => $data['weight'], 
                                                      'origin' => $data['origin'], 
                                                      'bmode' => $data['bmode'], 
                                                      'freight' => $data['freight'], 
                                                      'mode' => $data['mode'], 
                                                      'desc' => $data['desc'], 
													  'pickup_at' => Carbon::parse($data['pickup_at']),
                                                      'status' => $data['status'], 
                                                      ]);
			}                                         
                return $ret;
           }
           
           function addTrackingHistory($data)
           {
           	
				#''tnum', 'location', 'remarks', 'status'
				$ret = TrackingHistory::create(['tnum' => $data['tnum'],                                                                                                          
                                                      'location' => $data['location'], 
                                                      'remarks' => $data['remarks'],                                                     
                                                      'status' => $data['status'], 
                                                      ]);
			    
                 $ret = Trackings::where('tnum',$data['tnum'])->first();
				 $ret->update(['status' =>  $data['status']]);
				
                return $ret;
				
           }
           
           function addShipper($data)
           {
           	
				#''tnum', 'location', 'remarks', 'status'
				$ret = Shippers::create(['tnum' => $data['tnum'],                                                                                                          
                                                      'name' => $data['name'], 
                                                      'phone' => $data['phone'],                                                     
                                                      'address' => $data['address'], 
                                                      ]);
			                                  
                return $ret;
           }
           
           function addReceiver($data)
           {
           	
				#''tnum', 'location', 'remarks', 'status'
				$ret = Receivers::create(['tnum' => $data['tnum'],                                                                                                          
                                                      'name' => $data['name'], 
                                                      'phone' => $data['phone'],                                                     
                                                      'address' => $data['address'], 
                                                      ]);
			                                  
                return $ret;
           }
		   
		   function getTracking($tnum)
           {
           	$ret = [];
               $t = Trackings::where('tnum',$tnum)->first();
 
              if($t != null)
               {
               	#'tnum', 'stype', 'weight', 'origin', 'bmode', 'freight', 'mode', 'dest', 'desc', 'status'
                   $temp['id'] = $t->id; 
                   	     $temp['tnum'] = $t->tnum; 
                   	     $temp['stype'] = $t->stype; 
                            $temp['weight'] = $t->weight; 
                            $temp['origin'] = $t->origin; 
                            $temp['bmode'] = $t->bmode; 
                            $temp['freight'] = $t->freight; 
                            $temp['mode'] = $t->mode; 
                            $temp['desc'] = $t->desc; 
                            $temp['dest'] = $t->dest; 
							$temp['pickup_at'] = Carbon::parse($t->pickup_at)->format("jS F, Y");
                   	     $temp['status'] = $t->status; 
                         $temp['date'] = $t->created_at->format("jS F, Y"); 
                         $temp['last_updated'] = $t->updated_at->format("jS F, Y");
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	

           function getTrackings()
           {
           	   $ret = [];
				   $trackings =  Trackings::where('id','>','0')->get();
				   
				   if($trackings != null)
				   {
					  foreach($trackings as $t)
					  {
                   	     $temp['id'] = $t->id; 
                   	     $temp['tnum'] = $t->tnum; 
                   	     $temp['stype'] = $t->stype; 
                            $temp['weight'] = $t->weight; 
                            $temp['origin'] = $t->origin; 
                            $temp['bmode'] = $t->bmode; 
                            $temp['freight'] = $t->freight; 
                            $temp['mode'] = $t->mode; 
                            $temp['desc'] = $t->desc; 
                            $temp['dest'] = $t->dest; 
                            $temp['pickup_at'] = Carbon::parse($t->pickup_at)->format("jS F, Y"); 
                   	     $temp['status'] = $t->status; 
                         $temp['date'] = $t->created_at->format("jS F, Y h:i A"); 
                         $temp['last_updated'] = $t->updated_at->format("jS F, Y h:i A");
                         array_push($ret,$temp); 
					  }
                    }                          
                                                      
                return $ret;
           }


  function getTrackingHistory($tnum)
           {
           	$ret = [];
 
              $trackings =  TrackingHistory::where('tnum',$tnum)->get();
				   
				   if($trackings != null)
				   {
					  foreach($trackings as $t)
					  {
                   	     $temp['id'] = $t->id; 
                   	     $temp['tnum'] = $t->tnum; 
                   	     $temp['location'] = $t->location; 
                            $temp['remarks'] = $t->remarks;                             
                   	     $temp['status'] = $t->status; 
                         $temp['date'] = $t->created_at->format("jS F, Y h:i A"); 
                         $temp['last_updated'] = $t->updated_at->format("jS F, Y h:i A");
                         array_push($ret,$temp); 
					  }
                    }                   
                                                      
                return $ret;
           }		   
           
           function getShipper($tnum)
           {
           	$ret = [];
               $t = Shippers::where('tnum',$tnum)->first();
 
              if($t != null)
               {
               	$temp = [];
                   $temp['id'] = $t->id; 
                   	     $temp['tnum'] = $t->tnum; 
                   	     $temp['name'] = $t->name; 
                            $temp['address'] = $t->address; 
                            $temp['phone'] = $t->phone;                            
                         $temp['date'] = $t->created_at->format("jS F, Y"); 
                         $temp['last_updated'] = $t->updated_at->format("jS F, Y");
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	
           
           function getReceiver($tnum)
           {
           	$ret = [];
               $t = Receivers::where('tnum',$tnum)->first();
 
              if($t != null)
               {
               	$temp = [];
                   $temp['id'] = $t->id; 
                   	     $temp['tnum'] = $t->tnum; 
                   	     $temp['name'] = $t->name; 
                            $temp['address'] = $t->address; 
                            $temp['phone'] = $t->phone;                            
                         $temp['date'] = $t->created_at->format("jS F, Y"); 
                         $temp['last_updated'] = $t->updated_at->format("jS F, Y");
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }

           function track($tnum)
		   {
			   $ret = [];
			  $ret['tracking'] = $this->getTracking($tnum);
			 $ret['shipper'] = $this->getShipper($tnum);
			 $ret['receiver'] = $this->getReceiver($tnum);
			 $ret['history'] = $this->getTrackingHistory($tnum);
			   return $ret;
		   }		   
           
           
}
?>