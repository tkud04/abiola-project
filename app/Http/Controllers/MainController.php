<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Illuminate\Support\Facades\Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 

class MainController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;                     
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
    {
       $user = null;

		if(Auth::check())
		{
			$user = Auth::user();
		}

		
		$signals = $this->helpers->signals;
        #dd($posts);
    	return view('temp',compact(['user','signals']));
    }
	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function getTrack(Request $request)
    {
		$user = null;
		
    	if(Auth::check())
		{
			$user = Auth::user();
		}
        
        $req = $request->all();
		#dd($req);
        $validator = Validator::make($req, [
                             'xx' => 'required'                             
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
             $ret = $this->helpers->track($req['xx']);
			 #dd($ret);
			 if(count($ret['tracking']) < 1) return redirect()->intended('/');
			else return view('track',compact(['user','ret']));
         } 	  
    }

    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postViewAccount(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('login');
        }
        
        $req = $request->all();
		#dd($req);
        $validator = Validator::make($req, [
                             'acc' => 'required|numeric|not_in:none',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->intended('accounts?xf='.$user->id);
             //dd($messages);
         }
         
         else
         {
			 $uu = 'accounts?xf='.$req['acc'];
			 if(isset($req['xf'])) $uu = 'accounts?xf='.$req['xf'].'&cg='.$req['acc'];
         	 return redirect()->intended($uu);
         }  
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postViewConfig(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('login');
        }
        
        $req = $request->all();
		#dd($req);
        $validator = Validator::make($req, [
                             'acc' => 'required|numeric|not_in:none',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             $uu = 'config';
			 if(isset($req['xf'])) $uu = 'config?xf='.$req['xf'];
         	 return redirect()->intended($uu);
             //dd($messages);
         }
         
         else
         {
         	 $uu = 'config?cg='.$req['acc'];
			 if(isset($req['xf'])) $uu = 'config?xf='.$req['xf'].'&cg='.$req['acc'];
         	 return redirect()->intended($uu);
         }  
    }

  /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postAccounts(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('login');
        }
        
        $req = $request->all();
		#dd($req);
        $validator = Validator::make($req, [
                             'fname' => 'required',
                             'lname' => 'required',
                             'email' => 'required|email',
                             'phone' => 'required|numeric',
                             'acnum' => 'required|numeric',
                             'balance' => 'required|numeric',
                             'status' => 'required|not_in:none',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
             $ret = $this->helpers->updateUser($req);
	        session()->flash("update-status","ok");
			return redirect()->intended('accounts');
         } 	  
    }

	
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getZoho()
    {
        $ret = "1535561942737";
    	return $ret;
    }
    
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getPractice()
    {
		$url = "http://www.kloudtransact.com/cobra-deals";
	    $msg = "<h2 style='color: green;'>A new deal has been uploaded!</h2><p>Name: <b>My deal</b></p><br><p>Uploaded by: <b>A Store owner</b></p><br><p>Visit $url for more details.</><br><br><small>KloudTransact Admin</small>";
		$dt = [
		   'sn' => "Tee",
		   'em' => "kudayisitobi@gmail.com",
		   'sa' => "KloudTransact",
		   'subject' => "A new deal was just uploaded. (read this)",
		   'message' => $msg,
		];
    	return $this->helpers->bomb($dt);
    }   


}