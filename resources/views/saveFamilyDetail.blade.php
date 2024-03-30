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
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/data.js') }}"></script>
  </head>
  <body>
  @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
     @foreach ($errors->all() as $error)
         <li>{{$error}}</li>
     @endforeach
</div>
 @endif
    <div class="row">
        <div class="col-sm-6">

            <div class="testbox">
            <form action="save-family-details" method="POST" id="family" name="file_form" enctype="multipart/form-data">
                @csrf
                
                <div class="banner">
                    <h1>Family Details</h1>
                    
                </div>
                <h2>Add Family Head Member Detail</h2>
                <div class="item">
                    <p>Name</p>
                    <div class="name-item">
                        <input type="text" name="fname" placeholder="First Name" />
                        <input type="text" name="lname" placeholder="Last Name" />
                    </div>
                </div>
               
                <div class="item">
                    <p>Phone</p>
                    <input type="text" name="phone"/>
                </div>
                <div class="item">
                    <p>Birth Date</p>
                    <input type="date" name="bdate" />
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="item">
                    <p>Marital Status</p>
                    <div class="switch-field">
                        <input type="radio" id="radio-one" name="marital_sts" value="yes" checked/>
                        <label for="radio-one">Married</label>
                        <input type="radio" id="radio-two" name="marital_sts" value="no" />
                        <label for="radio-two">Un-Married</label>
                    </div>
                </div>
                
                <div class="item">
                    <p>Contact Address</p>
                    <input type="text" name="address" placeholder="Street address" />
                </div>
                <div class="item">
                    <p>Pincode</p>
                    <select  name="pincode">
                        @foreach($pincodes as $key)
                            <option value="{{$key->Pincode}}">{{$key->Pincode}}</option>
                        @endforeach
                       
                    </select>
                </div>
                <div class="item">
                    <p>City</p>
                    <select name="city">
                        @foreach($pincodes as $key)
                            <option value="{{$key->City}}">{{$key->City}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item">
                    <p>State</p>
                    <select name="state">
                        @foreach($pincodes as $key)
                            <option value="{{$key->State}}">{{$key->State}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item hobby">
                    <p>Hobbies</p>
                    <div class="name-item">
                        <input type="text" name="hobby[]" placeholder="Enter Hobby" />
                        <button class="btn btn-success add-hobby">Add Hobby</button>

                    
                    </div>
                </div>
                <div class="item">
                    <p>Photo</p>
                    <input type="file" name="file" placeholder="add photo" />
                </div>
                <div class="item">
                    <div class="name-item">
                        <h2>Add Family Member</h2>
                        <button class="btn btn-success add-family-member">
                            Add
                        </button>
                    </div>
                </div>
                <div class="testbox family-member" data-member-count="0">
                    
                </div>
                <div class="btn-block">
                <button type="submit" href="/">SEND</button>
                </div>
            </form>
            </div>
        </div>
        <div class="col-sm-6">
        <div class="testbox">
            <table class="table">
                <thead>
                <tr>
                    <th>Family Head Name</th>
                    <th>Family Member Count</th>
                </tr>
                </thead>
                <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key)
                    
                        <tr class='clickable-row' data-href='{{ $key->hid }}'>
                            <td>{{ $key->name }}</td>
                            <td>{{ $key->member_count }}</td>

                        </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="2">Data not found</td>
                    
                </tr>
                @endif
                
                </tbody>
            </table>
        </div>
        </div>
  </body>
</html>