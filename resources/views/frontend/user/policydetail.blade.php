@extends('frontend.layouts.main')
@section('tittle')
<title>User Dashboard – Get Tips, Online Quotes for Life Insurance</title>
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="{{ url('public/front/css/udashboad.css')}}">
<style type="text/css">
   body{
      background-color:rgb(246 248 251);
   }
   .card{
       background: #fff;
       border: 1px solid #cfd9e8;
       box-shadow: 0 10px 24px rgba(87,106,134,.2);
       padding: 32px 24px;
       border-radius: 16px;
       
   }
   .col-md-9 .card{
      border-left: 5px solid #2b3481;
   }
   .heading-2{
      color: #2b3481!important;
       font-weight: 800;
       font-size: 3rem;
       line-height: 3.5rem;
       margin-bottom: 48px;
   }
   .justify-content{
      justify-content: space-between;
   }
   .col-md-9 .card .card-footer{
      background-color: white;
      border-top: none;
   }
   .justify-content .badge{
       height: 19px;
       padding: 0 9px;
       height: 23px;
       border-radius: 4px;
       font-size: 12px;
       font-weight: 600;
       line-height: 23px;
       text-transform: capitalize;
       color: #fff;
   }
   .justify-content .badge-danger{
      background: #fff;
      border: 1px solid #eb5658;
      color: #eb5658;
   }
   .justify-content .badge-warning{
      background: #fff;
      border: 1px solid #ffc107;
      color: #ffc107;
   }
   .justify-content h3{
      color: #2b3481;
   }
   .date span{
      color: #3f3e81;
    font-weight: 900;
   }
   .policyid span{
       padding: 4px 7px;
       color: #2b3481;
       background-color: #edf5fc;
       border-radius: 3px;
       margin-top: 15px;
       font-size: 14px;
       font-weight: 600;
       line-height: 24px;
   }
   h5#exampleModalLabel {
       color: white;
   }
   .policyid a{
       padding: 4px 7px;
       color: #2b3481;
       background-color: #edf5fc;
       border-radius: 3px;
       margin-top: 15px;
       font-size: 14px;
       font-weight: 600;
       line-height: 24px;
   }
   .form-control{
      height: 42px !important;
      border-radius: 10px;
   }
   .iftext{
      color: #2b3481!important;
      font-weight: 900;
      font-size: 16px;
   }
   .readtext{
      color: #2b3481!important;
      font-weight: 900;
      font-size: 14px;
      margin-left: 10px;
   }
   #iconferm{
      height: 22px;
      width: 22px;
   }
   .modal-header{
      background-color: #2b3481;
   }
</style>
<div class="container mb-5" style="margin-top: 8rem;">
   <div class="row mt-5">
      <div class="col-md-12">
         <div class="heading-wrapper">
            <h1 class="heading-2 text-md-center">Policy Detail</h1>
         </div>
      </div>
      
   </div>
   <div class="row mt-5">
      <div class="col-md-9">
         <div class="card shadow profile_cards">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="policy d-flex">
                        <p class="policyid">
                           <span class="text-dark">Reffrence ID :</span>
                           10000{{ $data->sales_id }}
                        </p>
                     </div>
                     <div class="row mt-5">
                        <div class="col-md-6">
                           <div class="user_data">
                              <label>Policy Name</label>
                              <h5>VisitorSecure</h5>
                           </div>
                           <div class="user_data">
                              <label>Purchase Date</label>
                              <h5>Nov 22, 2022</h5>
                           </div>
                           <div class="user_data">
                              <label>Premium Paid</label>
                              <h5>$5.40</h5>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="user_data">
                              <label>Destination</label>
                              <h5>Canada</h5>
                           </div>
                           <div class="user_data">
                              <label>Policy Maximum</label>
                              <h5>$50,000</h5>
                           </div>
                           <div class="user_data">
                              <label>Deductible</label>
                              <h5>$100</h5>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="coverage">
                        <h3>Coverage Duration</h3>
                        <p class="condition">Upcoming</p>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="effiate_date">
                                 <label>Effective Date</label>
                                 <h6>Effective Date</h6>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="expire_date">
                                 <label>Expire On <span class="days">in 5 days</span></label>
                                 <h6 class="text-danger">Nov 27, 2022</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>
                  </div><hr>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="claim_inforamtion text-right">
                              <button class="claim_button" data-toggle="modal" data-target="#changepolicy">Change Request</button>
                              <button class="claim_button" data-toggle="modal" data-target="#cancelpolicy">Refund Request</button>
                              <button class="claim_button extend" data-toggle="modal" data-target="#extendpolicy"><i class="fa fa-refresh mr-2"></i>Extend</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
      </div>
      <div class="col-md-3">
         <div class="card">
            <div class="card-body p-0">
               <ul class="nav nav-tabs " role="tablist" style="display: block;">
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('profile')}}">Purchased Policies</a>
                  </li>
                  <li class="nav-item active">
                     <a class="nav-link" href="{{ url('logout')}}">Sign Out</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>


<!-- Modal -->
<div class="modal fade" id="changepolicy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style=" border-left: 5px solid #2b3481; border-radius: 20px; ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="POST" action="{{ url('') }}">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Reffrence ID</label>
                     <input readonly type="text" value="1000{{ $data->sales_id }}" class="form-control" name="">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Policy Number</label>
                     <input type="text" class="form-control" name="">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Efective Date</label>
                     <input readonly value="{{ $data->start_date }}" type="text" class="form-control" name="">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Return Date</label>
                     <input readonly value="{{ $data->end_date }}" type="text" class="form-control" name="">
                  </div>
               </div>
            </div>
            @php
               $startdate = strtotime($data->start_date);
               $enddate = strtotime($data->end_date);
               $datediff = $enddate - $startdate;
               $numberofdays =  round($datediff / (60 * 60 * 24));
            @endphp
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>New Efective Date</label>
                     <input onchange="getdate(this.value)" type="date" class="form-control" name="">
                  </div>
               </div>
               <script>
                  function getdate(id) {
                    var someDate = new Date(id);
                    var numberOfDaysToAdd = {{ $numberofdays }};
                    someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
                    var date = someDate.getMonth() + '/' + someDate.getDate() + '/' + someDate.getFullYear();
                    $('#newreturndate').val(date);
                  }
               </script>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>New Return Date</label>
                     <input readonly id="newreturndate" type="text" class="form-control" name="">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Upload Document</label>
                     <input type="file" style="height:50px !important;" class="form-control" name="">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <span class="iftext">The start date of the policy will only be changed if:</span><br><br>
                     <ul style="list-style:unset;margin-left: 15px;">
                        <li>The policy has not expired.</li>
                        <li>The insured has not travelled to Canada during the current policy period.</li>
                        <li>Proof of the changed itinerary such as a flight ticket, boarding pass, or stamp on the passport is provided. If the policy has been in effect for more than six months, we require a copy of all passport pages as well.</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <input type="checkbox" id="iconferm" required > <label class="readtext" for="iconferm">I Read all the Points and i Confirm all Information is Correct</label>
                  </div>
               </div>
            </div>
            
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="claim_button">Send Request</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="cancelpolicy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style=" border-left: 5px solid #2b3481; border-radius: 20px; ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Refund Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="POST" action="{{ url('') }}">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Reffrence ID</label>
                     <input readonly type="text" value="1000{{ $data->sales_id }}" class="form-control" name="">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Policy Number</label>
                     <input type="text" class="form-control" name="">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Efective Date</label>
                     <input readonly value="{{ $data->start_date }}" type="text" class="form-control" name="">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Return Date</label>
                     <input type="date" class="form-control" name="">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Refund Form</label>
                     <input type="file" style="height:50px;" class="form-control" name="">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Proof Of Return</label>
                     <input type="file" style="height:50px;" class="form-control" name="">
                  </div>
               </div>
            </div>
            
            
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="claim_button">Send Request</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="extendpolicy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style=" border-left: 5px solid #2b3481; border-radius: 20px; ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Extend Policy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('extendpolicy') }}">
            @csrf
      <div class="modal-body">
         
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Reffrence ID</label>
                     <input readonly type="text" value="1000{{ $data->sales_id }}" class="form-control" name="reffrence_id">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Policy Number</label>
                     <input required placeholder="Enter Policy Number" type="text" class="form-control" name="policy_number">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Efective Date</label>
                     <input readonly value="{{ $data->start_date }}" type="text" class="form-control" name="efective_date">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Return Date</label>
                     <input readonly value="{{ $data->end_date }}" type="text" class="form-control" name="return_date">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>New Return Date</label>
                     <input type="date" class="form-control" name="new_return_date">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <span class="iftext">This policy will only be extended if:</span><br><br>
                     <ul style="list-style:unset;margin-left: 15px;">
                        <li>The insured(s) has/have not incurred a claim under this policy</li>
                        <li>The insured(s) agree that expenses related to medical conditions present on the date of application for an extension will not be covered by this policy</li>
                        <li>Coverage under this policy is in force at the time the request for an extension is received</li>
                        <li>The insured(s) pay any additional required premium for such extension</li>
                        <li>The extension period applied for, plus the original policy period do not exceed the maximum number of days allowable for the selected plan.</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <input type="checkbox" id="iconferm" required > <label class="readtext" for="iconferm">I Read all the Points and i Confirm all Information is Correct</label>
                  </div>
               </div>
            </div>
         
      </div>
      <div class="modal-footer">
        <button type="submit" class="claim_button">Send Request</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection