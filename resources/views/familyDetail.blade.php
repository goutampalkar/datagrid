<!DOCTYPE html>
<html>
  <head>
    <title>Family Details</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  </head>
  <body>
    <div class="row">
        <div class="col-sm-12">

            <div class="testbox">
                <div class="banner">
                    <h1>Family Details</h1>
                </div>
                <h2> Family Head Member Detail</h2>
                <div class="item">
                    <p>Name</p>
                    <div class="name-item">
                        <input type="text" name="fname" placeholder="First Name" value="{{ $dada->fname }}" readonly/>
                        <input type="text" name="lname" placeholder="Last Name" value="{{ $dada->lname }}" readonly/>
                    </div>
                </div>
               
                <div class="item">
                    <p>Phone</p>
                    <input type="text" name="phone" value="{{ $dada->phone }}" readonly/>
                </div>
                <div class="item">
                    <p>Birth Date</p>
                    <input type="date" name="bdate" value="{{ $dada->bdate }}" readonly/>
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="item">
                    <p>Marital Status</p>
                    <div class="switch-field" >
                        <input type="radio" id="radio-one" name="marital_sts" value="yes" {{ $dada->marital_sts == "yes" ? "checked":"" }}/>
                        <label for="radio-one">Married</label>
                        <input type="radio" id="radio-two" name="marital_sts" value="no" {{ $dada->marital_sts == "no" ? "checked":"" }}/>
                        <label for="radio-two">Un-Married</label>
                    </div>
                </div>
                
                <div class="item">
                    <p>Contact Address</p>
                    <input type="text" name="address" placeholder="Street address" readonly/>
                </div>
                <div class="item">
                    <p>Pincode</p>
                    <input type="text" name="pincode" value="{{ $dada->pincode }}" readonly/>
                    
                </div>
                <div class="item">
                    <p>City</p>
                    <input type="text" name="city" value="{{ $dada->city }}" readonly/>
                </div>
                <div class="item">
                    <p>State</p>
                    <input type="text" name="state" value="{{ $dada->state }}" readonly/>
                </div>
                <div class="item hobby">
                    <p>Hobbies</p>
                    
                    @if(!empty($dada->hobbies ) )
                        @foreach( json_decode($dada->hobbies) as $key )
                            <div class="name-item">
                                <input type="text" name="hobby" placeholder="Enter Hobby"  value="{{ $key }}" readonly/>
                            </div>
                           
                        @endforeach
                    @endif
                </div>
                <div class="item">
                    <p>Photo</p>
                    <img src="{{asset('file/'.$dada->photo) }}" class="img"/>
                </div>
                <div class="item">
                    <div class="name-item">
                        <h2> Family Members</h2>
                        
                    </div>
                </div>
                <div class="testbox family-member" data-member-count="0">
                
                        @if(!empty($familyMember ) )
                        
                       
                            @foreach( $familyMember as $key )
                           
                            <div class="memberBox">
                                    
                                    <div class="item">
                                        <p>Name </p>
                                        <div class="name-item">
                                            <input type="text" name="fmfname[]" placeholder="First Name" value="{{ $key->fname }}"/>
                                            <input type="text" name="fmlname[]" placeholder="Last Name" value="{{ $key->lname }}"/>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <p>Birth Date</p>
                                        <input type="date" name="fmbdate[]" value="{{ $key->bdate }}"/>
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="item">
                                        <p>Marital Status</p>
                                        <div class="switch-field">
                                            <input type="radio" id="radio-" name="fmfmarital_stsa{{ $key->id }}" value="yes" {{ $key->marital_sts == "yes" ? "checked":"" }}/>
                                            <label for="radio-a{{ $key->id }}">Married</label>
                                            <input type="radio" id="radio-" name="fmfmarital_stsb{{ $key->id }}" value="no" {{ $key->marital_sts == "no" ? "checked":"" }}/>
                                            <label for="radio-b{{ $key->id }}">Un-Married</label>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <p>Education</p>
                                        <input type="text" name="education[]" placeholder="Education" value="{{ $key->education }}"/>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                </div>
                
            </div>
        </div>
        
  </body>
</html>