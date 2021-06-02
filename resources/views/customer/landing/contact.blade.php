@include('layouts.landing.header')
<div class="container">

    <h1 class="title">Contact</h1>


    <!-- form -->
    <div class="contact">



        <div class="row">

            <div class="col-sm-12">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0134284858095!2d106.84164251434476!3d-6.645253366809201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c89505b4c37d%3A0x307fc4a38e65fa2b!2sSMK%20Wikrama%20Bogor!5e0!3m2!1sid!2sid!4v1622650199161!5m2!1sid!2sid" width="100%" height="300" frameborder="0" allowfullscreen="" loading="lazy"></iframe>
                </div>


                <div class="col-sm-6 col-sm-offset-3">
                    <div class="spacer">

                        <h4>Write to us</h4>
                        <form role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <input type="phone" class="form-control" id="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <textarea type="email" class="form-control" placeholder="Message" rows="4"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">Send</button>
                        </form>
                    </div>


                </div>





            </div>
        </div>
    </div>
    <!-- form -->

</div>
@include('layouts.landing.footer')

