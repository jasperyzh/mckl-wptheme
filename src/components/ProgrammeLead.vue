<template>
  <section id="programme-lead">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <form id="gform-mckl" class="col" method="POST" action="./thank-you">
            <div id="ga-form_full_name" class="form-group">
              <label for="full_name"
                >Full Name <span class="text-danger">*</span></label
              >
              <input
                type="text"
                class="form-control"
                name="full_name"
                id="full_name"
                placeholder="e.g. Adam Smith"
                required
              />
            </div>

            <div id="ga-form_email" class="form-group">
              <label for="email"
                >Email <span class="text-danger">*</span></label
              >
              <input
                type="email"
                class="form-control"
                name="email"
                id="email"
                placeholder="e.g. adam.smith@email.com"
                required
              />
            </div>

            <div id="ga-form_phone" class="form-group">
              <label for="mobile_phone"
                >Phone <span class="text-danger">*</span></label
              >
              <input
                type="text"
                class="form-control"
                name="mobile_phone"
                id="mobile_phone"
                placeholder="e.g. 0108881234"
                required
              />
            </div>

            <hr />

            <div class="form-row row-cols-1 property-interest__agreement">
              <div class="col form-group mb-1">
                <div class="form-check">
                  <input
                    type="checkbox"
                    id="branding"
                    name="branding"
                    class="form-check-input"
                  />
                  <label for="branding" class="form-check-label"
                    >I agree to receive future communications from MCKL.</label
                  >
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
              </div>
              <div class="col form-group mb-1">
                <div class="form-check">
                  <input
                    type="checkbox"
                    id="tnc"
                    name="tnc"
                    class="form-check-input"
                  />
                  <label for="tnc" class="form-check-label">
                    I have understood and accepted the
                    <a href="#" target="_blank"
                      >Privacy Policy and Disclaimer Notices</a
                    >
                    and
                    <a href="#" target="_blank"
                      >Personal Data Protection Notification.</a
                    >
                    <span>*</span></label
                  >
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
              </div>
            </div>

            <input type="hidden" name="programme_interested" value="" />

            <button
              type="submit"
              class="btn btn-primary btn-primary-mckl mt-4"
              id="gform-mckl__submit"
            >
              Submit
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>


<script>
export default {
  mounted() {
    // form submission
    (function ($) {
      // serializeObject is not a core function of jQuery
      $.fn.serializeObject = function () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
          if (o[this.name]) {
            if (!o[this.name].push) {
              o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || " ");
          } else {
            o[this.name] = this.value || "";
          }
        });
        return o;
      };

      $.validator.addMethod(
        "lettersonly",
        function (value, element) {
          return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
        },
        "Letters only please"
      );
      $.validator.addMethod(
        "emailExtraCheck",
        function (value, element) {
          return (
            this.optional(element) ||
            /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(
              value
            )
          );
          // return regex.test(email);
        },
        "Please enter a valid email address"
      );

      // form selector
      var $form = $("form#gform-mckl");

      // url of gsheet webapp
      var gsheet_url =
        "https://script.google.com/macros/s/AKfycbyhquZbpcdfgVBRoyUX3AkKrByty1j2u7ZoTi7NIBo8wrVQoV4oGMud4TzfCwvU0mlNgA/exec";

      // jquery validation
      $form.validate({
        rules: {
          full_name: {
            required: true,
            lettersonly: true,
            minlength: 5,
            maxlength: 120,
          },
          email: {
            required: true,
            email: true,
            emailExtraCheck: true,
          },
          mobile_phone: {
            required: true,
            number: true,
            minlength: 8,
            maxlength: 15,
          },
          programme_interested: {
            required: true,
          },
        },
        // Specify validation error messages
        messages: {
          full_name: {
            required: "Please enter your full name",
            lettersonly: "Please enter your name in alphabet only",
            minlength: "Your name is too short",
            maxlength: "Your name is too long",
          },
          email: "Please enter a valid email address",
          mobile_phone: {
            required: "Please enter your contact number",
            number: "Number only, no special character required",
            minlength: "Your phone number is too short",
            maxlength: "Your phone number is too long",
          },
          programme_interested: {
            required: "Please select your preference",
          },
        },
        // debug: true,

        /*  submitHandler: function (form) {
           $("#gform-mckl__submit").prop('disabled', true);
           // form.submit();
       } */
      });

      $form.submit(function (e) {
        if (!$form.valid()) {
          console.log("form not valid !!");
          return;
        }
        // check valid

        // get sanitized formdata
        let formdata = get_form_data($form);
        console.log(formdata);

        // submit form
        form_submit_to_google_sheet(formdata, gsheet_url);

        // go to thank you page
        return false;
      });

      // func - get sanitized formdata
      function get_form_data(element) {
        var data = element.serializeObject();
        data.programme_interested = data.programme_interested.toString();
        // gsheet - https://docs.google.com/spreadsheets/d/1RTfHGUgFTJ1ut3GAfeNXCTP3o6nNXFF_ITNACk4qH4M/edit#gid=0
        data.sheet_name = "openday";
        console.log(data);
        return data;
      }

      // func - ajax for form submission
      function form_submit_to_google_sheet(data, url) {
        $.ajax({
          url: url,
          method: "GET",
          dataType: "json",
          crossDomain: true,
          data: data,
          beforeSend: function () {
            $("#gform-mckl__submit").prop("disabled", true);
            // console.log('beforesend: sending')
          },
          success: function (xhr, status, error) {
            console.log(xhr, status, error);

            window.location.href = "./thank-you.html";
          },
          error: function (xhr, status, error) {
            console.log(xhr, status, error);
            $("#gform-mckl__submit").prop("disabled", false);
          },
        });
      }

      // bootstrap-picker
      $(".programme-picker").selectpicker({
        noneSelectedText: "Please choose your programmes",
      });
    })(jQuery);
  },
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
form label.error {
  padding: 0.25rem;
  color: #ff0000;
  font-size: 0.8rem;
  font-style: italic;
}
</style>