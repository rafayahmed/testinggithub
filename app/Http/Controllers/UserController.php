<?php

namespace Rozee\Http\Controllers;

use Illuminate\Http\Request;

use Rozee\Http\Requests;
use Rozee\http\Middlewaere;
use Rozee\Http\Controllers\Controller;
use Rozee\Data\Models\User;
use Rozee\Data\Models\Country;
use Rozee\Data\Models\City;
use Rozee\Data\Models\State;
use Rozee\Data\Models\Blog;
use Rozee\Data\Models\ContactForm;
use \View;
use Validator, Input, Redirect,Session; 
use Rozee\Data\Repositories\RepositoryInterface;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
   
   public $user;

   public function  __construct(RepositoryInterface $user)
   {
        $this->user=$user;
   }


   public function check()
   {
        return $this->user->getAllUser();

   }

    public function index()
    {
        if(Session::has('user'))
        {
            $user=session::get('user');
            if($user->id==1)
            {
                $user = User::orderBy('created_at','des')->paginate(5);        
                $user->setPath('user');           
                return View::make('index')->with('user', $user);

                //$user=User::select('first_name','id')->groupBy('first_name')->paginate(5);
                //User::insert(array('first_name'=>'Hello','email'=>'hello@gmail.com'));
                //User::where('id',5)->update(array('first_name'=>'wow'));
               // $users=User::all()->count();
               // $user=User::lists('id');           
               // return $user;
            }
            else
            {
                return Redirect::to('/');
            }
        } 
        else
        {
            return Redirect::to('/');
        }     
       
    }
  

    public function contact()
    {       

        if (Input::has('send'))
        {
           
            $rules = array(
            // 'user_name'       => 'required',
            // 'email'      => 'required|email',
            // 'message'      => 'required|max:200|'  
                );

        $validator = Validator::make(Input::all(), $rules);
            
            if ($validator->fails()) 
            {
                return back()->withInput()
                    ->withErrors($validator);

            } 
            else
            {
                // store
                $contact = new ContactForm;
                $contact->name     = Input::get('user_name');
                $contact->email    = Input::get('email');
                $contact->subject  = Input::get('subject');
                $contact->message  = Input::get('message');     
                $contact->save();
                Session::flash('message', 'Thanks for your feed back!'); 
                return Redirect::to('/');
            }
        }  

       return View::make('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $countries = Country::lists('name','id');  

        $rules = array(
            // 'first_name'       => 'required',
            // 'email'      => 'required|email|unique:user',
            // 'password'      => 'required|alphaNum|min:3|confirmed',
            // 'password_confirmation'      => 'required|alphaNum|min:3',            
            // 'country_id'       => 'required',
            // 'city_id'      => 'required',           
            //  'state_id'      => 'required',           
            // 'gender'       => '',                   
            // 'dob' => 'required'

        );
        $validator = Validator::make(Input::all(), $rules);

        if (Input::has('create-user')) {
            

            // process the login
            if ($validator->fails()) 
            {
               
            } 
            else
            {echo 'yahoo';
               
         
                // store
                $user = new User;
                $user->first_name       = Input::get('first_name');
                $user->last_name      = Input::get('last_name');
                $user->mid_name = Input::get('mid_name');
                $user->email       = Input::get('email');
                $user->password       = Input::get('password');
                $user->country_id      = Input::get('country_id');
                $user->state_id = Input::get('state_id');
                $user->city_id = Input::get('city_id');
                $user->office_no       = Input::get('office_no');
                $user->mobile_no      = Input::get('mobile_no');
                $user->gender = Input::get('gender');
                $user->dob = Input::get('dob');
                dd(Input::all());

                $user->save();

                                 

                // redirect
                Session::flash('message', 'Successfully created user!');
                Session::put('user',$user);


                return Redirect::to('/');
            }
    }
    else
    {  
      
        if(Input::has('country_id')) 
        {            
            $countryId =  Input::get('country_id');
            $state = State::where('country_id','=',$countryId)->lists('name','id')->count();
            if($state>0)
            {
                 $state = State::where('country_id','=',$countryId)->lists('name','id');
            }
            else
            {
                 $state = array('N\A');
            }
        } 
        else 
        {
            $countryId = 0;
            $state = array('Select State');
        }

        if(Input::has('state_id')) 
        {
            $stateId =  Input::get('state_id');
            $cities = City::where('state_id','=',$stateId)->lists('name','id')->count();          
            if($cities>0)
            {
                $cities = City::where('state_id','=',$stateId)->lists('name','id');
            }
            else
            {
                $cities = array('N\A');
            }
         
        } 
        else 
        {
            $stateId = 0;
            $cities = array('Select City');
        }
    }

        return View::make('create')->with('countries', $countries)
                                    ->with('countryId',$countryId)
                                    ->with('state', $state)
                                    ->with('stateId',$stateId)
                                    ->with('cities',$cities)
                                    ->with('errors',$validator->messages());

                                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    // public function store()
    // {
    //     $rules = array(
    //         'first_name'       => 'required',
    //         'email'      => 'required|email',
    //         'country_id'       => 'required',
    //         'city_id'      => 'required',           
    //         'state_id'      => 'required',           
    //         'gender'       => '',                   
    //         'dob' => 'required'

    //     );
    //     $validator = Validator::make(Input::all(), $rules);

    //     // process the login
    //     if ($validator->fails()) {
    //         return Redirect::to('user/create')
    //             ->withErrors($validator)
    //             ->withInput(Input::except('password'));
    //     } else {
    //         // store
    //         $user = new User;
    //         $user->first_name       = Input::get('first_name');
    //         $user->last_name      = Input::get('last_name');
    //         $user->mid_name = Input::get('mid_name');
    //         $user->email       = Input::get('email');
    //         $user->country_id      = Input::get('country_id');
    //         $user->state_id = Input::get('state_id');
    //         $user->city_id = Input::get('city_id');
    //         $user->office_no       = Input::get('office_no');
    //         $user->mobile_no      = Input::get('mobile_no');
    //         $user->gender = Input::get('gender');
    //         $user->dob = Input::get('dob');

            
    //         $user->save();

    //         // redirect
    //         Session::flash('message', 'Successfully created user!');
    //         return Redirect::to('user');
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */



    public function show($id)
    {
        $user = User::find($id);

        // show the view and pass the user to it
        return View::make('show')
            ->with('user', $user);
    }

    public function login()
    {         
            
        if(Input::get('login'))
        {
            $rules=array('email' => 'required',
                         'password' => 'required|min:3|alphaNum');


            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) 
            {
                 return back()->withInput()
                    ->withErrors($validator);
            } 
            else 
            {     

                $email= Input::get('email');
                $password=Input::get('password');
                   
                $user=User::where('email','=',$email)->where('password','=',$password)->first();
                    
                if($user!=NULL)
                {

                    $blogs = Blog::orderby('created_at','dec')->Paginate(10);
                    $blogs->setPath('blogs');                    
                    Session::put('user',$user);
                    //return View::make('showblogs')->with('user',$user)->with('blogs',$blogs);   
                    return Redirect::to('/');
                }
                else
                {
                    Session::flash('message', 'Incorrect email or paswword');                   
                    return back()->withInput();
                }
                    
            }
        }
        else
        {
            if(Session::has('user'))
            {
                return Redirect::to('/');
            }
            else
            {
                return View::make('login');
            }           

        }   
                  
    }  



    public function welcome()
    {    
        if (Session::has('user')) 
        {
            $user = Session::get('user');
            return View::make('welcome')->with('user',$user);
        } 
        else 
        {
            return Redirect::to('login');          
        }          
    }



      public function logout()
    {   

        if(Session::has('user'))
        {
            Session::forget('user');
           return Redirect::to('login');
        }
        else
        {
            return Redirect::to('login');
        }

                   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $user = User::find($id);

        if(Input::has('update')) 
        {
             $rules = array(
            'first_name'       => 'required',
            'email'      => 'required|email',
            'country_id'       => 'required',
            'city_id'      => 'required',           
            'state_id'      => 'required',           
            'gender'       => '',                   
            'dob' => 'required');

             $validator = Validator::make(Input::all(), $rules);

             if ($validator->fails()) 
            {
                return Redirect::to('user/edit/'.$id)
                ->withErrors($validator);
            } 
            else 
            {                
            // update        
            $user->first_name       = Input::get('first_name');
            $user->last_name      = Input::get('last_name');
            $user->mid_name = Input::get('mid_name');
            $user->email       = Input::get('email');
            $user->country_id      = Input::get('country_id');
            $user->state_id = Input::get('state_id');
            $user->city_id = Input::get('city_id');
            $user->office_no       = Input::get('office_no');
            $user->mobile_no      = Input::get('mobile_no');
            $user->gender = Input::get('gender');
            $user->dob = Input::get('dob');
            $user->save();
            // redirect
            Session::flash('message', 'Successfully updated user!');
            return Redirect::to('user/'.$user->id);
            }
        }
        

        $countries = Country::lists('name','id');  

        $countryId = $user->country_id;  
        $stateId =  $user->state_id;
        $cityId =  $user->city_id;

         
        //if(Input::has('country_id'))  
        if(isset($_POST['country_id']))        
        {                  
            $countryId =  Input::get('country_id');

            $state = State::where('country_id','=',$countryId)->lists('name','id')->first();
            if($state!=NULL)
            {
                 $state = State::where('country_id','=',$countryId)->lists('name','id');
                 $stateId = State::where('country_id','=',$countryId)->lists('id')->first();
            }
            else
            {
                 $state = array('N\A');
            }
        } 
        else 
        {
            $state = State::where('country_id','=',$countryId)->lists('name','id');
        }

        if(Input::has('state_id')) 
        {

            $stateId =  Input::get('state_id');
            $cities = City::where('state_id','=',$stateId)->lists('name','id')->first();          
            if($cities!=Null)
            {
                $cities = City::where('state_id','=',$stateId)->lists('name','id');
               $cityId =  City::where('state_id','=',$stateId)->lists('id')->first();
            }
            else
            {
                $cities = array('N\A');
            }
         
        } 
        else 
        {
             $cities = City::where('state_id','=',$stateId)->lists('name','id');
        }

             
        // show the edit form and pass the user
        return View::make('edit')->with('user', $user)
                                 ->with('countries',$countries)
                                 ->with('state',$state)
                                 ->with('cities',$cities)
                                 ->with('countryId',$countryId)
                                 ->with('stateId',$stateId)
                                 ->with('cityId',$cityId);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    // public function update($id)
    // {

    //      $user = User::find($id)->toArray();
    //     $countries = Country::lists('name','id'); 
    //     $rules = array(
    //         'first_name'       => 'required',
    //         'email'      => 'required|email',
    //         'country_id'       => 'required',
    //         'city_id'      => 'required',           
    //         'state_id'      => 'required',           
    //         'gender'       => '',                   
    //         'dob' => 'required'

    //                     );
    //     $validator = Validator::make(Input::all(), $rules);

    //     if (Input::has('update')) 
    //     {
           
    //         // process the login
    //         if ($validator->fails()) 
    //         {
    //             return Redirect::to('user/edit/'.$id)
    //             ->withErrors($validator);

    //         } 
    //         else 
    //         {
                
    //         // update
    //         $user = User::find($id);
    //         $user->first_name       = Input::get('first_name');
    //         $user->last_name      = Input::get('last_name');
    //         $user->mid_name = Input::get('mid_name');
    //         $user->email       = Input::get('email');
    //         $user->country_id      = Input::get('country_id');
    //         $user->state_id = Input::get('state_id');
    //         $user->city_id = Input::get('city_id');
    //         $user->office_no       = Input::get('office_no');
    //         $user->mobile_no      = Input::get('mobile_no');
    //         $user->gender = Input::get('gender');
    //         $user->dob = Input::get('dob');
    //         $user->save();
    //         // redirect
    //         Session::flash('message', 'Successfully updated user!');
    //         return Redirect::to('user');
    //         }
    //     }

    //     if(Input::has('country_id')) 
    //     {            
    //         $countryId =  Input::get('country_id');
    //         $state = State::where('country_id','=',$countryId)->lists('name','id')->count();
    //         if($state>0)
    //         {
    //              $state = State::where('country_id','=',$countryId)->lists('name','id');
    //         }
    //         else
    //         {
    //              $state = array('N\A');
    //         }
    //     } 
    //     else 
    //     {
    //         $countryId = 0;
    //         $state = array('Select State');
    //     }

    //     if(Input::has('state_id')) 
    //     {
    //         $stateId =  Input::get('state_id');
    //         $cities = City::where('state_id','=',$stateId)->lists('name','id')->count();          
    //         if($cities>0)
    //         {
    //             $cities = City::where('state_id','=',$stateId)->lists('name','id');
    //         }
    //         else
    //         {
    //             $cities = array('N\A');
    //         }
         
    //     } 
    //     else 
    //     {
    //         $stateId = 0;
    //         $cities = array('Select City');
    //     }

    //     return View::make('edit')->with('user',$user)->with('countries', $countries)                                 
    //                                 ->with('state', $state)                                    
    //                                 ->with('cities',$cities)
    //                                 ->with('errors',$validator->messages());
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $admin=session::get('user');
        $user = User::find($id);
        if($admin->id == 1)
        {            
        $user->delete();
        Session::flash('message', 'Successfully deleted the user!');
        return Redirect::to('user');
        }
        else
        {  
        Session::forget('user');
        $user->delete();
        Session::flash('message', 'Your account has been deleted, Successfully!');
        return Redirect::to('blogs');
        }
    }
}
