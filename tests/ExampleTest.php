<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\Factory as TestDummy;



class ExampleTest extends TestCase
{
    //use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    // public function testBasicExample()
    // {
        
    //     $this->visit('/')
    //         //->click('Ok')
    //         ->crawler->selectLink('Ok','blogs/blogbyuser/27');
    //         //->seePageIs('blogs/blogbyuser/27');
    // }
        

    // public function test2BasicExample()
    // {
        
    //     $this->visit('/');
    // }
           
                
         public function testTrueIsTrue()
        {
            $foo = false;
            $this->assertFalse($foo);
        }

        public function testSeeAllBlogs()
        {
            $this->visit('/')
                ->see('All blogs');
            
        }

         public function testPostNewBlog()
        {
            $this->visit('/')
            ->click('Post new blog')
            ->seePageIs('login');
            
        }

        public function testPostNewBlogIfLoggedIn()
        {
            // $this->session(['id'=>'40'])
            // ->visit('/')
            // ->click('Post new blog')        
            // ->seePageOn('/blog/create');


            
        }   

        public function testCallBlogsRoute()
        {
            $response = $this->action('GET', 'BlogController@showAllblogs', ['user_id' => 1]);
            

        }

        public function testCreateBlog()
        {
            // $this->visit('blog/create')
            //     ->type('This is title','title')
            //     ->type('This is short description','short_description')
            //     ->type('This is description','description')
            //     ->press('Post')
            //     ->isPageIs('blogs/blogbyuser/');
        }   

        

         public function testBlogPostedByUserNameFindHisId()
        {
            $this->visit('blogs/blogbyuser/27')
                ->click('Rafay')
                ->seePageIs('user/40')           
                ->see('rafayehmed@gmail.com');
        }

         public function testHello()
        {
            Session::start(); // Start a session for the current test
            $params = [
                '_token' => csrf_token(), // Retrieve current csrf token
                'name' => 'Bob',
            ];

            $response = $this->call('POST', 'hello', $params);

            $this->assertResponseOk();
            $this->assertEquals('Hello ' . $params['name'], $response->getContent());
        }

         public function testComment()
        {
            $this->visit('blogs/blogbyuser/26')
                ->see('Back to blogs')
                ->withSession(['user'=>'40'])
                ->see('Discussion')
                //->type('comment','Comment')          
               // ->click('comment')
                ->seePageIs('blogs/blogbyuser/26');
        }
    


        public function testSession()
            {
                // $this->withSession(['2' => 'user'])
                //      ->visit('/');
            }

     

        // public function 
        // $response = $this->action('GET', 'PostsController@index');

        public function testCreatePost()
        {
            // $this->withSession(['40'=>'user'])
            //     ->visit('blog/create')
            //     ->see('Create New Blog')
            //     ->type('Title','title')
            //     ->type('ok','short_description')
            //     ->type('done','description')
            //     ->type( 40 , 'user_id')
                  
            //     ->press('Post')
                
            //     ->seePageIs('blogs/blogbyuser/30')
            //     ->see('Title');
        }

         public function testCreatePostUsingSubmitForm()
        {
            $this->withSession(['40'=>'user'])
                ->visit('blog/create');
                //->see('Create New Blog');
               // ->submitForm('Post', ['title' => 'Title', 'short_description'=>'asdf', 'description'=>'asdf']);                
               
                       
                //->onPage('blogs');
                //->see('Create a User');
        }
        
        public function testLogin()
        {
            $this->visit('login')
                ->see('User Login')
                ->submitForm('Login', ['email' => 'rafayehmed@gmail.com', 'password'=>'asdf'])                
                ->see('rafayehmed@gmail.com')
                //->seePageIs('blogs')
                ->click('Rafay')
                ->see('Azad Kashmir');           
        }
        

        public function testSignUpForRoot()
        {
            $this->visit('/')
                ->see('SignUp')
                ->click('SignUp')
                ->seePageIs('user/create');

        }

        public function testLoginWhenFailed()
        {
            $this->visit('login')
                ->see('User Login')
                ->press('login')
                ->seePageIs('login')
                ->See('The email field is required.');
               

        }

         public function testForSignUp()
        {
            // $this->visit('login')
            //     ->see('User Login')
            //     ->press('SignUp')
            //     ->seePageIs('user/create')
            //     ->See('Create a User');         

        }


        public function testDatabase()
        {
        // Make call to application...
        $this->seeInDatabase('blog', ['title' => 'Ok','short_description'=>'Okadasd','description'=>'ok']);
        $this->seeInDatabase('user', ['first_name' => 'admin','email'=>'admin@ok.com','country_id'=>'187']);
       
        }
         public function testCreatePostUsingArray()
        {
             $this->visit('blog/create')->see('New');

           $data =  array(['title' => 'The Title', 'short_description'=>'asdf', 'description'=>'asdf']);
            $response = $this->action('POST', 'BlogController@store', null, $data);


        }


        public function testFeedback()
        {
             

          $this->visit('contact')
                        ->see('Please give us your feedback')                    
                        ->type('hi','user_name')
                        ->type('hi@c.com','email')
                        ->type('done','subject')  
                        ->type('done','message');                    
                        // ->press('Send')                
                        // ->seePageIs('/')
                        // ->see('All Blogs');  

           
        }
            //OK
         public function testAddUserFeedback()
        {        
               $data =  array(
                'name' => 'send',
                'user_name'=>'hasan',
                'email'=>'hasan@yahoo.com',
                'subject'=>'Post blog',
                'message'=>'How to post plog on Rozee'
                );
               //$response = $this->action('GET', 'UserController@feedback', null, $data);

           
        }
            //OK
         public function testAddUserFeedback2()
        {
                     
              $this->visit('contact')
                        ->see('Please give us your feedback')                    
                        ->type('hi','user_name')
                        ->type('hi@c.com','email')
                        ->type('done','subject') ; 
                        // ->type('dones','message')                    
                        // ->press('Send')                
                        // ->seePageIs('/')
                        // ->see('All Blogs');      
        }

       
        
         public function testCreateUser()
            {
                $this->visit('user/create')
                    ->see('Create a User')
                    ->type('Mobile','first_name')
                    ->type('phone','last_name')
                    ->type('i','mid_name')
                    ->type('iphone@apple.com','email')
                    ->type('apple','password')
                    ->type('apple','password_confirmation')
                    ->select('187','country_id') //187
                    ->press('Create the User!')
                    ->select('3220','state_id') //3220
                     ->press('Create the User!')
                    ->select('6601','city_id')
                    ->type('M','gender')  
                    ->type('','dob')           
                    ->press('Create the User!');

               

                    //->see('All Blogs');
                    //->seePageIs('blogs');
            }



        public function testCreateUserResponse()
            {
                $this->call('GET','user/create');
                $this->assertResponseOk();
            }

        public function testShouldDoLogin()
        {
            $this->visit('login')
                    ->see('User Login')
                    ->type('admin@ok.com','email')
                    ->type('asdf','password')                 
                    ->press('Login')
                    ->seePageIs('/')
                    ->see('All Blogs')
                    ->onPage('/');                      

  
        }

        public function testUserCreateNewBlog()
        {
            $this->visit('login')
                    ->see('User Login')
                    ->type('admin@ok.com','email')
                    ->type('asdf','password')                 
                    ->press('Login')
                    ->seePageIs('/')
                    ->see('Post new blog')
                    ->onPage('/')
                    ->click('Post new blog')
                    ->see('Create New Blog')
                    ->type('title','title')
                    ->type('short description','short_description')
                    ->type('long description ','description');
                    // ->press('Post')
                    // ->see('Rozee');
  
        }

        


    
}


