1.GATES

You can define gates either in your controller or in route , prefered one will be route because it reduces your code.
 controller:
  public function index()
    {
        //one way
        // if (!Gate::allows('admin')) {
        //     abort(403);
        // }

        //second way
        //This line checks if the authenticated user (retrieved automatically from the request) passes the gate named 'admin'. 
        //If the user fails the gate check, Laravel will automatically throw an AuthorizationException.
        
        $this->authorize('admin');

        return view('admin.dashboard');
    }