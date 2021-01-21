        <div class="col-lg-4">
          <div class="user-profile-info-area">
            <ul class="links">
                @php 

                  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
                  {
                    $link = "https"; 
                  }
                  else
                  {
                    $link = "http"; 
                      
                    // Here append the common URL characters. 
                    $link .= "://"; 
                      
                    // Append the host(domain name, ip) to the URL. 
                    $link .= $_SERVER['HTTP_HOST']; 
                      
                    // Append the requested resource location to the URL 
                    $link .= $_SERVER['REQUEST_URI']; 
                  }      

                @endphp
              <li class="{{ $link == route('user-dashboard') ? 'active':'' }}">
                <a href="{{ route('user-dashboard') }}">
                  {{ $langg->lang200 }}
                </a>
              </li>
              
              @if(Auth::user()->IsVendor())
                <li>
                  <a href="{{ route('vendor-dashboard') }}">
                    {{ $langg->lang230 }}
                  </a>
                </li>
              @endif

              @if(auth()->user()->is_agent === 1)
              <li class="{{ $link == route('agent-dashboard') ? 'active':'' }}">
                  <a href="{{route('agent-dashboard')}}">Agent Panel</a>
              </li>
              @endif

              <li class="{{ $link == route('user-orders') ? 'active':'' }}">
                <a href="{{ route('user-orders') }}">
                  {{ $langg->lang201 }}
                </a>
              </li>

              @if($gs->is_affilate == 1)

                <li class="{{ $link == route('user-affilate-code') ? 'active':'' }}">
                    <a href="{{ route('user-affilate-code') }}">{{ $langg->lang202 }}</a>
                </li>

                <li class="{{ $link == route('user-wwt-index') ? 'active':'' }}">
                    <a href="{{route('user-wwt-index')}}">{{ $langg->lang203 }}</a>
                </li>

              @endif

              <li class="{{ $link == route('user-adverts') ? 'active':'' }}">
                  <a href="{{route('user-adverts')}}">Advert</a>
              </li>


              <li class="{{ $link == route('user-order-track') ? 'active':'' }}">
                  <a href="{{route('user-order-track')}}">{{ $langg->lang772 }}</a>
              </li>

              <li class="{{ $link == route('user-favorites') ? 'active':'' }}">
                  <a href="{{route('user-favorites')}}">{{ $langg->lang231 }}</a>
              </li>

              <li class="{{ $link == route('user-messages') ? 'active':'' }}">
                  <a href="{{route('user-messages')}}">{{ $langg->lang232 }}</a>
              </li>

              <li class="{{ $link == route('user-message-index') ? 'active':'' }}">
                  <a href="{{route('user-message-index')}}">{{ $langg->lang204 }}</a>
              </li>

              <li class="{{ $link == route('user-dmessage-index') ? 'active':'' }}">
                  <a href="{{route('user-dmessage-index')}}">{{ $langg->lang250 }}</a>
              </li>

              <li class="{{ $link == route('user-profile') ? 'active':'' }}">
                <a href="{{ route('user-profile') }}">
                  {{ $langg->lang205 }}
                </a>
              </li>

              <li class="{{ $link == route('user-reset') ? 'active':'' }}">
                <a href="{{ route('user-reset') }}">
                 {{ $langg->lang206 }}
                </a>
              </li>

              <li>
                <a href="{{ route('user-logout') }}">
                  {{ $langg->lang207 }}
                </a>
              </li>

            </ul>
          </div>

          @if(auth()->user()->is_agent == 0)
            <div class="row mt-4">
              <div class="col-lg-12 text-center">
                <a href="javascript:void(0)" class="mybtn1 lg" data-toggle="modal" data-target="#exampleModalCenter">
                  <i class="fas fa-user"></i> Become an agent
                </a>
              </div>
            </div>








            <!-- Become an agent modal -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Become An Agent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{ url('user/become-an-agent') }}">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <div class="">
                          <label>Agent Name</label>
                        </div>
                        <div class="">
                          <input type="text" name="agent_name" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="">
                          <label>Agent Phone Number</label>
                        </div>
                        <div class="">
                          <input type="text" name="agent_phone_number" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="">
                          <label>Agent Address</label>
                        </div>
                        <div class="">
                          <input type="text" name="agent_address" class="form-control">
                        </div>
                      </div>

                      <button type="submit" class="btn btn-danger">Submit</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>


          @endif

          @if($gs->reg_vendor == 1)
            <div class="row mt-4">
              <div class="col-lg-12 text-center">
                <a href="{{ route('user-package') }}" class="mybtn1 lg">
                  <i class="fas fa-dollar-sign"></i> {{ Auth::user()->is_vendor == 1 ? $langg->lang233 : (Auth::user()->is_vendor == 0 ? $langg->lang233 : $langg->lang237) }}
                </a>
              </div>
            </div>
          @endif

          
        </div>