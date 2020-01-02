@extends('layouts.layout')

@section('content')

<h3 align="center">Bio-Data <small>(Learning Laravel)</small><a href="{{ route('showBioData') }}"><button class="btn btn-warning pull-right">Bio-History</button></a></h3><hr>

<form class="form-horizontal" method = "POST" action="/saveBioData" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Mobile:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" pattern="\d*" minlength="10" maxlength="10">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="dob">DOB:</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter DOB">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="Gender">Gender:</label>
        <div class="col-sm-10">
            <input type="radio" name="gender" id="gender" value="Male"> Male
            <input type="radio" name="gender" id="gender" value="Female"> Female
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="interested_in">Interested In:</label>
        <div class="col-sm-10">
            <input type="checkbox" name="interested_in[]" id="interested_in" value="Foot Ball"> Foot Ball
            <input type="checkbox" name="interested_in[]" id="interested_in" value="Cricket"> Cricket
            <input type="checkbox" name="interested_in[]" id="interested_in" value="Video Games"> Video Games
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="state">State:</label>
        <div class="col-sm-10">
            <select name="state" class="form-control" id="state">
                <option selected disabled>Select State</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Kerala">Kerala</option>
                <option value="Karnataka">Karnataka</option>
                <option value="UP">UP</option>
                <option value="AP">AP</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="photo">Photo:</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="photo" id="photo">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="address">Address:</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="address" id="address" placeholder="Enter Address"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </div>

</form>

@endsection
