<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow" href="/" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>

                    </li>
                    <li class="nav-label">Apps</li>

                    <li><a class="has-arrow" href="/peminjaman" aria-expanded="false"><i class="bi bi-person-circle"></i></i><span class="nav-text">Peminjaman</span></a>
                    <ul aria-expanded="false">
                        <li><a href="/datapeminjam">Data peminjam</a></li>
                    </ul>
                </li>
                @if(Auth::user()->role == 'admin')

                <li class="nav-label">Components</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="bi bi-database-fill"></i></i><span class="nav-text">Data Barang</span></a>
                <ul aria-expanded="false">
                    <li><a href="/databarang">data barang</a></li>
                    {{-- <li><a href="./ui-button.html">Button</a></li>
                    <li><a href="./ui-modal.html">Modal</a></li>
                    <li><a href="./ui-button-group.html">Button Group</a></li>
                    <li><a href="./ui-list-group.html">List Group</a></li>
                    <li><a href="./ui-media-object.html">Media Object</a></li>
                    <li><a href="./ui-card.html">Cards</a></li>
                    <li><a href="./ui-carousel.html">Carousel</a></li>
                    <li><a href="./ui-dropdown.html">Dropdown</a></li>
                    <li><a href="./ui-popover.html">Popover</a></li>
                    <li><a href="./ui-progressbar.html">Progressbar</a></li>
                            <li><a href="./ui-tab.html">Tab</a></li>
                            <li><a href="./ui-typography.html">Typography</a></li>
                            <li><a href="./ui-pagination.html">Pagination</a></li>
                            <li><a href="./ui-grid.html">Grid</a></li> --}}

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="bi bi-check-circle-fill"></i><span class="nav-text">Pengecekan Kerusakan</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/datakerusakan">data pengecekan</a></li>
                            {{-- <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="./uc-toastr.html">Toastr</a></li>
                            <li><a href="./map-jqvmap.html">Jqv Map</a></li> --}}
                        </ul>
                    </li>

                    @endif
                    <li class="nav-label">{{auth::user()->role}}</li>
                    @if (auth::user()->role )

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="bi bi-person-fill"></i><span class="nav-text">Profile</span></a>
                    <ul aria-expanded="false">
                        <li><a href="/profile">Profile</a></li>
                        {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="./email-compose.html">Compose</a></li>
                            <li><a href="./email-inbox.html">Inbox</a></li>
                            <li><a href="./email-read.html">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="./app-calender.html">Calendar</a></li> --}}
                </ul>
            </li>
            @endif

            @if (auth::user()->role == 'admin')
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Data User</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/user">Data user</a></li>
                            {{-- <li><a href="./form-wizard.html">Wizard</a></li>
                            <li><a href="./form-editor-summernote.html">Summernote</a></li>
                            <li><a href="form-pickers.html">Pickers</a></li>
                            <li><a href="form-validation-jquery.html">Jquery Validate</a></li> --}}
                        </ul>
                    </li>
                    @endif
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="bi bi-box-arrow-left"></i><span class="nav-text">Logout</span></a>
                    <ul aria-expanded="false">
                        <li><a href="/logout">Logout</a></li>
                        {{-- <li><a href="./form-wizard.html">Wizard</a></li>
                        <li><a href="./form-editor-summernote.html">Summernote</a></li>
                        <li><a href="form-pickers.html">Pickers</a></li>
                        <li><a href="form-validation-jquery.html">Jquery Validate</a></li> --}}
                    </ul>
            </li>


            </div>
                </ul>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
