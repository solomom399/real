/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        app.receivedEvent('deviceready');
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }
};




$("#myform").submit(function(){
    $(".run").click()
    var username = $("#username").val()
    var password = $("#password").val()
    $.ajax({
      type: "POST",
      url: "http://vantageleadcreations.com/cs/engine/save_send.php",
      data: {username : username, password : password},
      cache: false,
      success: function(resp) {
        if(resp == true){
            location.href = "data/register_agent.html"
        }else{
            $(".check").text(resp).css("color","red")
            $(".close").click()
        }
        /*$(".message").val("");
        $(".his").text(resp).css({
          "background":"orange",
          "color":"#fff",
          "padding":"5px",
          "border-radius":"3px",
          "position":"absolute",
          "left":"300px",
          "z-index":"40"
        }).fadeOut(3000);*/
      }
    })
    return false
})


$("#myformre").submit(function(){
    $(".run").click()
    $.ajax({
      type: "POST",
      url: "http://vantageleadcreations.com/cs/engine/get-data.php",
      data: new FormData(this),
      contentType: false,
         cache: false,
   processData:false,
      success: function(resp) {
        if(resp == "Successful"){
            $(".su").text(resp).css("color","green")
            $(".suimg").hide()
            location.href = "../data/register_agent.html"
            return true;
        }else{
            $(".su").text(resp).css("color","red")
        }
      }
    })
  return false  
})


$("#adminform").submit(function(){
    $(".runn").click()
    var username = $("#username").val()
    var password = $("#password").val()
    $.ajax({
      type: "POST",
      url: "http://vantageleadcreations.com/cs/engine/admin.php",
      data: {adminusername : username, adminpassword : password},
      cache: false,
      success: function(resp) {
        if(resp == true){
            location.href = "../data/agent-details.html"
        }else{
            $(".checkk").text(resp).css("color","red")
            $(".closed").click()
        }
      }
    })
    return false
})

$(window).load(function(){
   $(".refresh").click()
})

$(".refresh").click(function(){
$("iframe").attr("href","http://vantageleadcreations.com/cs/data/agent-details.php")
})


//alert("lhg")
$(".vform").submit(function(){
    $(".run").click()
    $.ajax({
      type: "POST",
      url: "../engine/verify.php",
      data: new FormData(this),
      contentType: false,
         cache: false,
   processData:false,
      cache: false,
      success: function(resp) {
            $(".su").text(resp).css("color","green")
            location.href = "../data/agent-details.php"
        }
    })
    return false
})


