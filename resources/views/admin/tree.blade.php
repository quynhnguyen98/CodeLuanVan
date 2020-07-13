@extends('ad_caygiapha')
@section('content')
    
 
   
 




    <main class="app-content">
        
        <div class="tile">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group">
                          <div class="input-group-btn search-panel">
        
                            
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">
                        <input type="text" class="form-control searchbox-input" name="searchbox-input" placeholder="Search term..">
                        <button type="button" class="btn btn-secondary btn-sm clear-filter ml-1">Clear</button>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 pt-2">
                            <span id="filterBy" class=""><strong>Note:</strong><i> Filtered by Contains</i></span>
                        </div>
                        <div class="col-lg-6 pt-2">
                            <div class="pull-right">
                                <span id="totalMale" class="badge badge-primary">Male: </span>
                                <span id="totalFemale" class="badge badge-danger">Female: </span>
                                <span id="totalPeople" class="badge badge-info">People: </span>
                                <span id="filteredPeople" class="badge badge-success">Filtered: </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="tile">
            <div class="row cards-container">
                    <div class="col-lg-3">
                     <div class="container">
                        <p>
                        <h3>Chart Tree - Editable Mode</h3>
                        </p>
                        <ol class="breadcrumb">
                           <li><a href="../index.html">Home</a></li>
                           <li><a href="../started.html">Getting Started</a></li>
                           <li class="active">Edit Chart Tree</li>
                        </ol>
                        <!-- Start Chart Script -->
                        <hr />
                        <div id="tcontainer">
                    
                           <div class="item">
                              <div id="treemsg"></div>
                           </div>
                    
                           <div class="row">
                              <div class="col-md-12">
                                 <table class="table table-hover table-condensed table-bordered">
                                    <thead>
                                       <th>Color Settings</th>
                                       <th></th>
                                       <th>Connect Settings</th>
                                       <th></th>
                                       <th></th>
                                       <th></th>
                                       <th></th>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td style="width:15%">Background Color</td>
                                          <td style="width:3%">
                                             <div id="gcolorbk" class="color-box"></div>
                                          </td>
                                          <td style="width:15%">Connect Style</td>
                                          <td style="width:15%">
                                             <select id="drp_type" name="drp_type" class="form-control input-sm">
                                                <option value="Flowchart" selected>Flow Chart</option>
                                                <option value="StateMachine">State Machine</option>
                                                <option value="Bezier">Bezier</option>
                                             </select>
                                          </td>
                                          <td style="width:15%">Line Color</td>
                                          <td style="width:3%">
                                             <div id="lnColor" class="color-box"></div>
                                          </td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>Font Color</td>
                                          <td>
                                             <div id="gcolorfont" class="color-box"></div>
                                          </td>
                                          <td>Line Width</td>
                                          <td><input type="text" id="txt_linewidth" value="1" maxlength="1"
                                                class="form-control input-sm" /></td>
                                          <td style="width:15%">Line Hover Color</td>
                                          <td style="width:3%">
                                             <div id="lhoverColor" class="color-box"></div>
                                          </td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>Border Color</td>
                                          <td>
                                             <div id="gcolorborder" class="color-box"></div>
                                          </td>
                                          <td></td>
                                          <td></td>
                                          <td><button id="btn_updsetting" class="btn btn-xs btn-primary">Update Setting</button></td>
                                          <td></td>
                                          <td> </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="item_c">
                                    <div class="btn-group"><button id="_saveTree" title="Save Chart" class="btn btn-success btn-lg">Save
                                          Chart</button>
                                    </div>
                                 </div>
                              </div>
                    
                              <!-- store tree stats -->
                              <div id="dinfo">
                                 <span id="findex" style="display:none;"></span>
                                 <span id="fid" style="display:none;">0</span>
                                 <span id="postop" style="display:none;"></span>
                                 <span id="posleft" style="display:none;"></span>
                              </div>
                          
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <script type="text/javascript">
                                    var dn='http://jchart.bootstrapkits.com/';
                                    var hd='tree/handler.php';
                                    var sconnects='tree/savecon.php';
                                    var lhandler='tree/load.php';
                                    var chandler='tree/lconnects.php';
                                    var strokeColor='#005b0f';
                                    var hoverPaintStyle='#ff0000';
                                    var strokeLineWidth=1;
                                    var hoverstrokeLineWidth=2;
                                    var connectStyle='Flowchart';
                                    var offsetdiff=20;
                                    var defaultUName='Default Node';
                                    var defaultFName='';
                                    var defaultSName='';
                                    var redirectPageName='created.html';
                                    var chartID='88';
                                    var msgLabel='treemsg';
                                    var cornerRadius='10';
                                    var overlaySettings=["Arrow",{location:0.1,id:"charLabel",direction:-1}];
                                    var bkColor="#666";
                                    var ftColor="#fff";
                                    var brColor="#000";
                                    var titleElementID="txt_chartname";
                                    var smoothScroll=false;
                                    var readOnly=false;
                                    var plUploadHandler="tree/modules/uploadhandler.php";
                                    var plupload_flash_url="assets/plugins/plupload/js/plupload.flash.swf";
                                    var plupload_silverlight_url="assets/plugins/plupload/js/plupload.silverlight.xap";
                                    var maxFileSize="10mb";
                                    var defaultThumbUrl="public/project/assets/images/holder.png"</script>
                    
                                    <div class="modal fade" id="cModal">
                    
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                   aria-hidden="true">&times;</button>
                                                <h4 id="aheading" class="modal-title"></h4>
                                             </div>
                                             <div id="lcatform">
                                                <div class="item" id="modaltopnav">
                                                   <nav class="navbar navbar-inverse" role="navigation">
                                                      <!-- Brand and toggle get grouped for better mobile display -->
                                                      <div class="navbar-header">
                                                         <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                            data-target="#bs-example-navbar-collapse-1">
                                                            <span class="sr-only">Toggle navigation</span>
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                         </button>
                                                      </div>
                                                      <div class="collapse navbar-collapse" id="rnav">
                                                         <ul class="nav navbar-nav">
                                                            <li id="modal5" class="active"><a id="_parentNode" title="Add parent node"
                                                                  href="#">Add Parent</a></li>
                                                            <li id="modal6"><a id="_childeNode" title="Add child node" href="#">Add
                                                                  Child</a></li>
                                                            <li id="modal7"><a id="_leftNode" title="Add another node on right side"
                                                                  href="#">Add Left</a></li>
                                                            <li id="modal8"><a id="_rightNode" title="Add another node on left side"
                                                                  href="#">Add Right</a></li>
                                                            <li id="modal9"><a id="_createNode" title="Add node without any relationship"
                                                                  href="#">Add Node</a></li>
                                                         </ul>
                                                      </div>
                                                   </nav>
                                                </div>
                                                <div class="pd_5" id="einfo">
                                                   <form id="modalfrm" method="post">
                                                      <div id="modalmsg"></div>
                                                      <div id="modalemode">
                                                         <ul class="nav nav-tabs">
                                                            <li><a href="#personal" data-toggle="tab">General</a></li>
                                                            <li><a href="#contact" data-toggle="tab">Contact</a></li>
                                                            <li><a href="#biographical" data-toggle="tab">Biographical</a></li>
                                                            <li><a href="#theme" data-toggle="tab">Theme</a></li>
                                                         </ul>
                                                         <div class="tab-content">
                                                            <div class="tab-pane active" id="personal">
                                                               <div class="row item_pad">
                                                                  <div class="col-lg-3">
                                                                     <div class="pd_5" id="modaledthumb">
                                                                        <div id="_tThumb" class="vd" style="width:100px;\">
                                                                           <a href="#" title="user profile">
                                                                              <img class="img-rounded" id="modaledchange"
                                                                                
                                                                                 style="width:100px; height:100px;" alt="Profile Photo">
                                                                           </a>
                                                                           <div class="dur mini-text ui-corner-all"
                                                                              style="bottom:5px; right:5px; display:none;">
                                                                              <a id="tchange" class="xxmedium-text"
                                                                                 title="update photo"><span
                                                                                    class=" glyphicon glyphicon-plus-sign white"></span></a>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-lg-9">
                                                                     <div class="form-horizontal" role="form">
                                                                        <fieldset>
                                                                           <div class="form-group">
                                                                              <label for="txt_sname"
                                                                                 class="col-lg-3 control-label input-sm">Title:</label>
                                                                              <div class="col-lg-7">
                                                                                 <input type="text" id="txt_nd_title"
                                                                                    class="form-control input-sm" name="txt_nd_title"
                                                                                    placeholder="Enter Title">
                                                                              </div>
                                                                           </div>
                                                                           <div class="form-group">
                                                                              <label for="txt_nd_desc"
                                                                                 class="col-lg-3 control-label input-sm">Description:</label>
                                                                              <div class="col-lg-7">
                                                                                 <textarea id="txt_nd_desc" name="txt_nd_desc"
                                                                                    class="form-control input-sm" rows="3"
                                                                                    placeholder="Enter Description"></textarea>
                                                                              </div>
                                                                           </div>
                                                                           <div class="form-group">
                                                                              <label for="txt_fname"
                                                                                 class="col-lg-3 control-label input-xs">First
                                                                                 Name:</label>
                                                                              <div class="col-lg-7">
                                                                                 <input type="text" id="txt_fname"
                                                                                    class="form-control input-sm" name="txt_fname"
                                                                                    placeholder="Enter First Name">
                                                                              </div>
                                                                           </div>
                                                                           <div class="form-group">
                                                                              <label for="txt_sname"
                                                                                 class="col-lg-3 control-label input-sm">Sur Name:</label>
                                                                              <div class="col-lg-7">
                                                                                 <input type="text" id="txt_sname"
                                                                                    class="form-control input-sm" name="txt_sname"
                                                                                    placeholder="Enter Sur Name">
                                                                              </div>
                                                                           </div>
                                                                           <div class="form-group">
                                                                              <label for="txt_sname"
                                                                                 class="col-lg-3 control-label input-sm">Gender:</label>
                                                                              <div class="col-lg-7">
                                                                                 <label class="radio-inline">
                                                                                    <input type="radio" name="gender" id="modalckmale"
                                                                                       value="male"> Male
                                                                                 </label>
                                                                                 <label class="radio-inline">
                                                                                    <input type="radio" name="gender" id="modalckfemale"
                                                                                       value="female">
                                                                                    Female
                                                                                 </label>
                                                                              </div>
                                                                           </div>
                    
                                                                        </fieldset>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="tab-pane" id="contact">
                                                               <div class="item_pad">
                                                                  <div class="form-horizontal" role="form">
                                                                     <fieldset>
                                                                        <div class="form-group">
                                                                           <label for="txt_email"
                                                                              class="col-lg-3 control-label input-sm">Email:</label>
                                                                           <div class="col-lg-7">
                                                                              <input type="text" id="txt_email"
                                                                                 class="form-control input-sm" name="txt_email"
                                                                                 placeholder="Enter Email">
                                                                           </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <label for="txt_website"
                                                                              class="col-lg-3 control-label input-sm">Website:</label>
                                                                           <div class="col-lg-7">
                                                                              <input type="text" id="txt_website"
                                                                                 class="form-control input-sm" name="txt_website"
                                                                                 placeholder="Enter Website">
                                                                           </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <label for="txt_tel"
                                                                              class="col-lg-3 control-label input-sm">Tel:</label>
                                                                           <div class="col-lg-7">
                                                                              <input type="text" id="txt_tel"
                                                                                 class="form-control input-sm" name="txt_tel"
                                                                                 placeholder="Enter Home Tel">
                                                                           </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <label for="txt_tel"
                                                                              class="col-lg-3 control-label input-sm">Mobile:</label>
                                                                           <div class="col-lg-7">
                                                                              <input type="text" id="txt_mobile"
                                                                                 class="form-control input-sm" name="txt_mobile"
                                                                                 placeholder="Enter Mobile">
                                                                           </div>
                                                                        </div>
                    
                                                                     </fieldset>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="tab-pane" id="biographical">
                                                               <div class="item_pad">
                                                                  <div class="form-horizontal" role="form">
                                                                     <fieldset>
                    
                                                                        <div class="form-group">
                                                                           <label for="txt_profession"
                                                                              class="col-lg-3 control-label input-sm">Profession:</label>
                                                                           <div class="col-lg-7">
                                                                              <textarea id="txt_profession" name="txt_profession"
                                                                                 class="form-control input-sm" rows="2"
                                                                                 placeholder="Enter Profession"></textarea>
                                                                           </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <label for="txt_company"
                                                                              class="col-lg-3 control-label input-sm">Company:</label>
                                                                           <div class="col-lg-7">
                                                                              <textarea id="txt_company" name="txt_company"
                                                                                 class="form-control input-sm" rows="2"
                                                                                 placeholder="Enter Company"></textarea>
                                                                           </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <label for="txt_interests"
                                                                              class="col-lg-3 control-label input-sm">Interests:</label>
                                                                           <div class="col-lg-7">
                                                                              <textarea id="txt_interests" name="txt_interests"
                                                                                 class="form-control input-sm" rows="2"
                                                                                 placeholder="Enter Interests"></textarea>
                                                                           </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <label for="txt_bio"
                                                                              class="col-lg-3 control-label input-sm">Bio Notes:</label>
                                                                           <div class="col-lg-7">
                                                                              <textarea id="txt_bio" name="txt_bio"
                                                                                 class="form-control input-sm" rows="2"
                                                                                 placeholder="Enter Bio Notes"></textarea>
                                                                           </div>
                                                                        </div>
                                                                     </fieldset>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="tab-pane" id="theme">
                                                               <div class="item_pad">
                                                                  <div class="form-horizontal" role="form">
                                                                     <fieldset>
                    
                                                                        <div class="form-group">
                                                                           <label for="colorbk"
                                                                              class="col-lg-3 control-label input-sm">Background:</label>
                                                                           <div class="col-lg-7">
                                                                              <div id="colorbk" class="color-box"></div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <label for="colorfont"
                                                                              class="col-lg-3 control-label input-sm">Font Color:</label>
                                                                           <div class="col-lg-7">
                                                                              <div id="colorfont" class="color-box"></div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <label for="colorborder"
                                                                              class="col-lg-3 control-label input-sm">Border
                                                                              Color:</label>
                                                                           <div class="col-lg-7">
                                                                              <div id="colorborder" class="color-box"></div>
                                                                           </div>
                                                                        </div>
                                                                     </fieldset>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-lg-7 col-md-offset-3">
                                                               <button id="btnmodok" class="btn btn-primary btn-sm">Ok</button>
                                                               <button class="btn btn-sm" data-dismiss="modal"
                                                                  aria-hidden="true">Cancel</button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div id="modaldmode">
                                                      </div>
                                                   </form>
                                                </div>
                                                <div class="pd_5" id="epartner" style="display:none;">
                                                   <div class="item_c">
                                                      <ul class="nav nav-pills nav-stacked">
                                                         <li><a id="apartner" href="#">Add New Partner</a></li>
                                                         <li><a id="aexpartner" href="#">Add New Ex Partner</a></li>
                                                         <li><a class="acancel" href="#">Cancel</a></li>
                                                      </ul>
                                                   </div>
                                                </div>
                                                <div class="pd_5" id="esubling" style="display:none;">
                                                   <div class="item_c">
                                                      <ul class="nav nav-pills nav-stacked" id="cpartners">
                    
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div><!-- /.modal-content -->
                                       </div><!-- /.modal-dialog -->
                                    </div>
                                    <div id="vcart">
                                       <div class="vcart-inner chart-demo" id="chart-demo">
                    
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                    
                        
                    
                        <!-- jQuery -->
                        
                        <script src="{{asset('public/project/assets/plugins/plumb/lib/jquery.min.js')}}"></script>
                        <script src="{{asset('public/project/assets/js/bootstrap.min.js')}}"></script>
                    
                        <script src="{{asset('public/project/assets/plugins/plumb/lib/jquery-ui-1.9.2-min.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/lib/jquery.ui.touch-punch.min.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/lib/jsBezier-0.6.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/lib/jsplumb-geom-0.1.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/util.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/dom-adapter.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/jsPlumb.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/endpoint.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/connection.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/anchors.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/defaults.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/connectors-bezier.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/connectors-flowchart.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/connectors-statemachine.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/connector-editors.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/renderers-svg.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/renderers-canvas.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/renderers-vml.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plumb/src/jquery.jsPlumb.js')}}"></script>
                        <script src="{{asset('public/project/assets/js/jquery.overscroll.min.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/plupload/js/plupload.full.js')}}"></script>
                    
                        <script src="{{asset('public/project/tree/tree.js')}}"></script>
                        <script src="{{asset('public/project/assets/js/jquery.mousewheel.js')}}"></script>
                        <script src="{{asset('public/project/assets/plugins/colpick/js/colpick.js')}}"></script>
                    
                    </div>
            </div>
        </div>
            </main>

    @endsection