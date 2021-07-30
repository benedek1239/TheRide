{{-- Style element to make the footer stays on the bottom of the page --}}
<head>
    <style>

        #kt_footer{
            width: 100%;
            margin-top:auto; 
        }
        .bg-white{
            background: none !important;
        }
        #ligthed-link{
            background: none;
            color: white;
        }
        #link-container{
            background-color: #3F4254;
        }
        .whited-style{
            color: white;
        }
    </style>
</head>    

{{-- The Footer element --}}
<div class="footer bg-white py-4 flex-lg-column " id="kt_footer">
    <!--begin::Container-->
    <div class="container  d-flex flex-column flex-md-row align-items-center justify-content-between" id="link-container">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="whited-style font-weight-bold mr-2">2021&copy;</span>
            <a href="http://www.sapientia.ro/hu" target="_blank" class="whited-style text-hover-primary">Sapientia</a>
        </div>
        <!--end::Copyright-->

        <!--begin::Nav-->
        <div class="nav nav-dark order-1 order-md-2">
            <a class="nav-link pl-3 pr-0 " id="ligthed-link">benedek.szabolcs@ms.sapientia.ro</a>
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Container-->
</div>