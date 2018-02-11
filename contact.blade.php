<!--God First-->
<!doctype html>
<html lang="en">


<!-- Head Section -->
<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Contact form that will send email when submitted.">
  <meta name="author" content="Dustin Ledbetter">
  <title>Contact Email Form</title>
  <!-- Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
  .invalid-feedback{
    display: block;
  }
</style>
</head>


<!-- Body Begins Here -->
<body>

  <!-- Contact Form -->
  <div class="container">
    <h1>Contact Us</h1>
      <div class="row">
          <div class="col-md-6">
            @if (Session::has('flash_message'))
                <!-- bootstrap alert -->
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif
              <form method="post" action="{{ route('contact.store') }}">
                  <!-- Used to Prevent Cross Site Request Forgery -->
                  {{ csrf_field() }}

                  <!-- Name Input Field -->
                  <div class="form-group">
                      <label>Name/Subject:</label>
                      <input type="text" class="form-control" name="name">
                      @if ($errors->has('name'))
                          <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
                      @endif
                  </div>

                  <!-- Email Input Field -->
                  <div class="form-group">
                      <label>Email:</label>
                      <input type="text" class="form-control" name="email">
                      @if ($errors->has('email'))
                          <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
                      @endif
                  </div>

                  <!-- Message Input Field -->
                  <div class="form-group">
                      <label>Message:</label>
                      <textarea class="form-control" name="message"></textarea>
                      @if ($errors->has('message'))
                          <small class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
                      @endif
                  </div>

                  <!-- Submit Button -->
                  <button class="btn btn-primary">Submit</button>

              </form>
          </div>
      </div>
  </div>


<!-- End Body -->
</body>


<!-- End HTML -->
</html>
