<!-- START: ASIDE MENU -->
<section class="">
    <div class="border-t border-b border-gray-200 py-12 mt-16 px-4">
      <div class="flex justify-center mb-8">
        <img style="width: 3%; height:2%"
            src="@foreach ($sitesetting as $logo)
            {{ $logo->logo_url }}"/>
            @endforeach
      </div>
      <aside class="container mx-auto">
        <div class="flex flex-wrap -mx-4 justify-center">
          <div class="px-4 w-full md:w-2/12 mb-4 md:mb-0 accordion">
            <h5 class="text-lg font-semibold mb-2 relative">Overview</h5>
            <ul class="h-0 invisible md:h-auto md:visible overflow-hidden">
              <li>
                <a href="#" class="hover:underline py-1 block">Shipping</a>
              </li>
              <li>
                <a href="#" class="hover:underline py-1 block">Refund</a>
              </li>
              <li>
                <a href="#" class="hover:underline py-1 block">Promotion</a>
              </li>
            </ul>
          </div>
          <div class="px-4 w-full md:w-2/12 mb-4 md:mb-0 accordion">
            <h5 class="text-lg font-semibold mb-2 relative">Company</h5>
            <ul class="h-0 invisible md:h-auto md:visible overflow-hidden">
              <li>
                <a href="about" class="hover:underline py-1 block">About</a>
              </li>
              <li>
                <a href="#" class="hover:underline py-1 block">Career</a>
              </li>
              <li>
                <a href="#" class="hover:underline py-1 block">Contact Us</a>
              </li>
            </ul>
          </div>
          <div class="px-4 w-full md:w-2/12 mb-4 md:mb-0 accordion">
            <h5 class="text-lg font-semibold mb-2 relative">Explore</h5>
            <ul class="h-0 invisible md:h-auto md:visible overflow-hidden">
              <li>
                <a href="#" class="hover:underline py-1 block"
                  >Terms & Conds</a
                >
              </li>
              <li>
                <a href="#" class="hover:underline py-1 block"
                  >Privacy Policy</a
                >
              </li>
              <li>
                <a href="#" class="hover:underline py-1 block"
                  >For Developer</a
                >
              </li>
            </ul>
          </div>
          <div class="px-4 w-full md:w-3/12 mb-4 md:mb-0">
            <h5 class="text-lg font-semibold mb-2 relative">
              Social Media & Contact Us
            </h5>
            
            
            <a href="@foreach ($sitesetting as $socialmedia)
            {{ $socialmedia->facebook }}">
            @endforeach
            <i class="fa fa-facebook"></i></a>
              
            <a href="@foreach ($sitesetting as $socialmedia)
            {{ $socialmedia->instagram }}">
            @endforeach
            <i class="fa fa-instagram"></i></a>
            
            <a href="@foreach ($sitesetting as $socialmedia)
            {{ $socialmedia->twitter }}">
            @endforeach
            <i class="fa fa-twitter"></i></a>

            <a href="@foreach ($sitesetting as $socialmedia)
            {{ $socialmedia->whatsapp }}">
            @endforeach
            <i class="fa fa-whatsapp"></i></a>

            <a href="mailto:@foreach ($sitesetting as $socialmedia)
            {{ $socialmedia->email }}">
            @endforeach
            <i class="fa fa-envelope"></i></a>
          </div>
        </div>
      </aside>
    </div>
  </section>
  <!-- END: ASIDE MENU -->

  <!-- START: FOOTER -->
  <footer class="flex text-center px-4 py-8 justify-center">
    <p class="text-sm">
      Copyright 2021 • All Rights Reserved LuxSpace by BuildWith Angga
    </p>
  </footer>
  <!-- END: FOOTER -->