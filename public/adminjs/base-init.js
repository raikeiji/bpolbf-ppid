
  function base_url(x){
      var http = location.protocol;
      var slashes = http.concat("//");
      var host = slashes.concat(window.location.hostname);
      var url = window.location.pathname.split( '/' );
      return host+'/'+url[x];
  }

  function s_loading(){
    $('.capture_loading12').remove();
    $('body').append('<div class="capture_loading12" style="box-shdow:0 0 1px solid #000;width:100%;height:100%;z-index:99999;background:transparent;position: fixed;left:0;top:0;text-align:center;color:#fff;"><span style="padding:15px 30px;width:300px;background:#fff;color:#000;font-size:14px;border-radius:25px;position:fixed;top:50%;left:50%;margin-top:-30px;margin-left:-150px;user-select: none;border:1px solid #d4d4d4;">Loading content ...</span></div>');
    setInterval(function(){
      var back = ["Loading Content ...","Please Waiting ...","Content progress ..."];
      var rand = back[Math.floor(Math.random() * back.length)];
      $('.capture_loading12 span').html(rand);
    },5000)
    // setTimeout(function(){
    //     sweetalert(5,'Please check your connection or network first!');
    // },60000)
  }

  function e_loading(){
    $('.capture_loading12').remove();
  }

  function sweetalert(tipe=1,msg=''){
      var protocol = location.protocol;
      var slashes = protocol.concat("//");
      var host = slashes.concat(window.location.hostname);
      var pathArray = window.location.pathname.split( '/' );
      var http=protocol + '//' + location.host+'/'+pathArray[1];
      if(tipe==1){
          var bg="background:rgba(80, 215, 97,0.8)";
          var img="src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAoCAYAAAD+MdrbAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4gcbCSgI/jcBsAAAAsxJREFUSMetlt2LlVUUxn/7PadGJ2REBxGjEEK0UVRUQvSiDwjMwuhSIQi87qb7wBvRmwGx0H9AUFAMRRj78CYhEgrmZggLJgkSRjrmYIIzzZlfN/uF5eacM+d4euBw9rv2s593vWuvvfaCDlCTOqoeUafUafWeekF9O88l+oHaVI+qv9odv2XOi/0Inrc/LKtfrCR2zsHxeTex99X5gvyLekgdUzerh9XZDqJbSrG16jcF6Ua3GKm3Cu61krBXvR8I99StPUKzSf0z8FvqKwBV5qwHNoY10ymluz3C/RfwVXheBRyMgpuAmFcvrZAMjYIzAmyNgvcBA+HvFQT/zV7WWARmo+A80AqECXVDD8G1wDsxrMCjGOR16u0Q5CV1ssemnC52+Ue1UZI+UxcCaVG9qL6W50fUCfWK2i4EJ6NQQ31X/anL8VrML1rI4+WCM116Npo9eV4cLwWPFR7FcflrdxFdU+s1gfiGBJwC5oDfQxbUaAO7gUPAgWD/ALhYezhXvG37ChWpUieLNWfq+Qq4FfjzKaWZXoIppWVgqjB/GwVXhYmK/lCW/yoOJsLEGnU9Q6AJPClsk+pD4AfgekppcVDBa8CeYPs4n82ZQcXqTz4N3C5sVVF9BhJsA2eAGf4HVCmldkrpKvAlsDC0YBi3gKXn1Hn6jKA6CnzSR+nvhhP6tAFQqSPA18DhIb70AIx8r45XwHvA/g4noZe3ox1s24G9TeDTnI81LgN3gTtqSil1Sp8/gJPAm7nqVMAY8BEd2o9duZ1LvSpO/v+wuDbmyD1fjUeDBC63fv+E9WerDpVjGKQK2BkMY7Gc94HNRS6/0exAOpZvsulisygu9pfz9fFCsD9uAjeBHcF4Pizqp9DGkN1EXa3OODzuPGg/2Fbv1j7152HE1LeeuRuWXHq1QeNIboK2AN8V8Slj+Hpu4y61lltT443xWYD/AAPw6uKspqOYAAAAAElFTkSuQmCC'";
          stl="style='width:25px;height:40px;left:5px;position:absolute'";
      }else if(tipe==2){
          var bg="background:rgba(252, 184, 6, 0.8)";
          var img="src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAjCAYAAADmOUiuAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4gcbCRw4Y8TC6wAAAv9JREFUWMPNmE1IVFEUx/8vrRTRLDOwoLCUij5WQYGgYBRUtDCzCIQWfUDRoqhQCAkiQqIWYYsKAjOqhVBQLaRdi6ACNxYVEfaxCYPUzHRMfb8WnaHbMF9vHGc8MPDmnv//nP87971773lSGgwoAHYAlUA5cBDwNFMM2AN85J+9AY7NJIFhm7QfwHegdKqxZ6VB3Fm7DEnaJmmrpElJCyTVZ7tyq4Bhq9gBZ/yUU9WSbAq8ZiLeAsURvvfme5AtcRVOlfbHeHHGgRCwIRsCX5u4njiYd4bpyrS4Q5b4N1ARB7fOqXJDpsQtsGcOewa9BPjLhu0HijIh8Kgl/AWscMZzbEfJj8CXAd8AH2jJRPXC1hzhu2o7yBugLcJ33jg/gYLpFNhliT5EjOcAzx3xb6Nw+813Z7rE1QBjtnTsjOK/6QhsjcEPW+10bHVnJM2R1ON53qMo/lHnOhTF/0zSQ7s+B+SlTSBQJ2mL/T0UAzbsXA9FOj3Pm5B0URKSqiTVpmtqC4Ehm5pLcXDN8XYWB3fXMAPpEthqAb8C8+PgTjgC9yaIGTLclSmJ831KgEEL1pIgaaMjsCYB9rCz7KycSvXuWaAfSWD3OQKrEmCLgF7DXk9VXHWyFYmyjCxNAt/g4NcHFZcPdBu5M8A6mbRA4zw2/OegAuuMGAI2JslZ6wicmySnHBg1zpEgAvuMdDsAZ5cjcFMA3g3j9CZ1Y0CbEcZTeG63A5sDchY6N9aUCLzG9tu4i22cw2kHcB9YHKRxt0Y/bOWxQB7Q7jTehQESlAKvnCR9ye61kuT/PQ29NO6TWElWOwl2p9BAfed/WxYwxk5gwl7MqmiAL6k2OLYsnXHEnQZyU4jzwvjdkVMbDj7m+/6iKZy2q4F6YHaKMZY4N3nc7RkGbLA921+lrHXAprtylp3NRux7SofneWT5W9QtO/COSarMlfRJ0qCkMklN1uf2Scp0JX1Jy61geZL6TYcEHGHmWaMkhd+0TknFkk7aVI9koYJImmdTe0HSU0n6A4WE1JI6J5dFAAAAAElFTkSuQmCC'";
          stl="style='width:40px;height:40px;left:5px;position:absolute'";
      }else if(tipe==3){
          var bg="background:rgba(88, 252, 233,0.8)";
          var img="src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB0AAAAoCAYAAAACJPERAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4gcbCR0sYAUn1wAAA7ZJREFUWMOlmF2IVVUUx/97bO5MjY5OH0PmMI7NgwTaiJoyU/ShIYWFRNGDPgk+VfQgPqQRlEESVPSFQ0ZgUIgFQ5AQFUFQWYkFiTFZ+JEVOSgqNnnV2zm/XvaFzeLsc849d8Hlsu/+r/U/+6yPvdZ1KhBghqT1klJJo5KWSHKS5kqa9p9JSV9L+lNSXVKfc+5jVRHgFmALsJ9ycgB4DBhqlWgeMAQ8BZygmhwBtgHXlCV9GPgK+I/2JAU+A+aUITweMfIj8DiwCOgCBoHZwM3AJuBgRO9noBYjXAycNQoN4FtgrORbusv71b6lQxcaSc1jBprgfuATA/wXeLZiAD4H1I29d/zenQI6vNNDuQQ8qTbEu+JKYPMCcA9wq4AB4I9gMwHG1aYADhg3h3kbuKP5RKEvp5OE+TmGutOU3iRhAJiVpszIIR4C/gps/w48KqDHPM3nQFeGgRqwFvjJvw18wDwN3AhcHSHeY+xvaZL+Yjb21JO0J8NH/0TS4ktgVYT0AYN9Qz7vPjIbCfApsNIrbgTOFRSDnRHStQb3Q9NPK4GTGRUFYKePvCJ5PUI6ZnD7ws37fWFvVCh3+4GlOQUjlPEs0Hafp2XkIvAqMJgTwS8bne0x4GZgsoDwTWBNQa72m1p+FtgQA3cC12X4o1mtVgNXFRB2ALuM7l7g7qKqssMo1YGFJapRN/Ci0Z0G1gEjRcp7TcRsiuD6gje0wqebld0eszyPcL4vW005EWtDgPv8vfoacNmkHMAHwKxmZ5JHehswFSh+B9wUwa4Dvo8E3A6gN8TnBUOv2e+XFOt5VktaYX67KGmrpF3OuUtlSTHrmqQ5QI+kJMDUJDUM9pikMefcVJbhPNJJSackXevX8yRNSDoo6YzvfRuSVkkaMLrbYoRlLuJnKnSBR4HOPLsd+aR6v8KzTjjnGlVP2ReJyOO+3r4L7Mu6IFJ4qCrpIuBvc8c+n4EbyZgEXqlC2Am8ZPrX3UBHBL/EdH6ngeFWfVqTNCyp2XSdl/Shcy7NifQJk+MjrZJeL2mBSa28YajmdUK7LZ/0tKTfTHU5lUN6WdLhYJ1I+rVVUueH2/Dkt+eQzpb0YLBOvUtaCqRe4AngfBAcJ4HRCP4tE71f5AVSjPQGP4XbPJ3yPdQyYI0fLb8x1xjA8rKTXkjaBcwElgbdfNj9hR8rL3gbc9sZhB4p2fcCvOf/GGlv8vLfo77k1SNkh4GtQHcZu64k+UxJ90oalLTMX+jD/po7KumQT5FJ59yVInv/A73goFHcred0AAAAAElFTkSuQmCC'";
          stl="style='width:30px;height:40px;left:5px;position:absolute'";
      }else{
          var bg="background:rgba(235, 80, 80,0.8)";
          var img="src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4gcbCRwn7szPHgAAA6ZJREFUWMPNmL9vHEUUxz9vcUKIIgMhokphKpQQISRoTBFEFMuW4oJE10CwBJUtjHFkOQpQ5Q+gSQUNkqW0FFGkFBSAaKj4ISHxSxTQBmLnhJM4vruZL0VmL+NJfLd7uz7nSavb25l5853v2/f2vWcUEEmYGZIMmASWgeeB74ENwLZbCjwBvAL8AXwCfGlmynXWKpIuqrpcLLOnlWCvAXwKHApDfwM/A+0+DO4BXgTGwrNVYM7MvqjMoqT895SkO/dJ8IuSxiQ9JWlU0pPbXKNhzpikjyIW70g6Fe9RBdzkFgN5P1XhwGcTc0+WBhlPljQdKWtJWpBk8q7KgReCrlymH7Z3EYWnJTWDkruSX6jR2c5LckF3U9LpsqeclrR236zuzYFO2ds670UsruVMbqs/AjchqR0tfrs7p9Oqg734fibapy1p4gGQyYKJ5CWek1SJtV5AwzWX7DnxUGuFUHI7TNpUp3OeIYmkDyPHuZ2HoHwwk3RO0vXuGZxb7o63WjsJLL6/ELF4Xc7NanXVkPRSQvFsd9Hm5jDYi+9nEywvI+ly9OBSSAiQcwzRxPmvBQy5rCD5H8OfdUmHd8IhyjmOOyz59RDffsqQvg7jPwAbtadAZTIXM5A2AhaQvsoAH8Y9j4RYngUB+IxHXEYKvhuPAe8ALwC/Fckje+SHR4BfgBUz6+OJ9vhIQb0Hgc/ARmoipgNcBf7tY+09RU3swJo1Wm7tns7+BynIiK0DHwPPAn9VNPFzwD/AeoHZvqjJ2sDnAVgFbxdABqZietQaKRyf6gtDpT5RGdj+cL8XsN3+kgQr7Q3U7M8wjoXxo8Azu/4lsewg2JHgxccysN/D+NPAWwDyfrfYA5gLWAD7E0njknxUVja6i4YANEm3zsUFrqRx1Gxmcm5J0o0I5NlhgIzSLCQtReBuyLklNZtZPPnMljLT+3eHZFqTtJyUoWe2o3gqmnhL3s/sFIsRe0tRPeIkTT2ALQE5nrQ6GnWDjMB9kKT44z3r72jhiS3NothxqhTu7Xa810LSTDpRSr+khqSbkZLFvF6pxN61aybn3o/03gytvYHcvnGvL5P3Z7Q4KItd6zg3L2kj0lneOgnIk9FpO5LmyyhMdM0nbZWTA786ieLjW4J5VJ6WCCWXkiB8vAi4Mi3gN4DLwIFo+Fvgbp8W8D7gtejZLWDGzK7U3khP2hODyoXSNV4JFkeB10MBdRT4LjDSi8EDwKvAr8AK8I2Z/VeUvf8BVUMi93E7hxkAAAAASUVORK5CYII=''";
          stl="style='width:40px;height:40px;left:5px;position:absolute'";
      }
      $("#sweetalertspan").remove();
      var data="<span id='sweetalertspan' style='display:none;text-align:center;"+
          "width:300px;min-height:70px;color:#fff;padding:10px 30px 10px 45px;position:absolute;z-index:9999;top:20px;"+
          "right:20px;border-radius:5px;box-shadow:0 0 5px #545454;"+bg+"'><img "+img+" "+stl+">"+msg+"<span id='sweetalertspanclose' "+
          "style='font-weight:bold;padding:0px 8px;cursor:pointer;z-index:99999;font-size:20px;position:absolute;"+
          "top:-5px;right:0px'>x</span></span>";
      $("body").append(data);
      $("#sweetalertspan").fadeIn();
      setTimeout(function(){
          $("#sweetalertspan").fadeOut();
          e_loading();
      },3000);
      $("#sweetalertspanclose").click(function(){
          $("#sweetalertspan").fadeOut();
      })
  }

  function remove_swal(){
      $('[data="swall"]').fadeOut();
      setTimeout(function(){
          $('[data="swall"]').remove();
      },1000);
  }

  function swal_send(link,id){
    // console.log(baseurl+'#'+link); return false;sadas
      $.ajax({
          type:'post',
          url:link,
          data:{'id':id},
          dataType:'json',
          success:function(re){
            $('[data="swall"]').fadeOut();
            $("#"+id).parent().parent().remove();
            sweetalert(1,re.msg);
            setTimeout(function(){
                $('[data="swall"]').remove();
                location.reload();
            },2000);
          }
      })
  }

  function swal(link,id){
      var lebar=eval($(window).width()/2)-175;
      var tinggi=eval($(window).height()/2)-100;

      var data="<div data='swall' style='position:fixed;top:0;left:0;width:100%;user-select:none;height:100%;background:rgba(0,0,0,0.5);z-index:9999;display:none'><div id='swaldiv' style='display:inline-block;box-shadow:0 0 5px #706f70;min-width:350px;height:200px;background:#f0f0f0;color:#fff;padding:10px;z-index:99999;position:fixed;top:"+tinggi+"px;left:"+lebar+"px;border-top:10px solid red'>"+
                "<h3 style='color:red;text-align:center'>Warning !"+
                "<span style='width:20px;height:20px;color:#red;position:absolute;top;top:10px;right:10px;cursor:pointer' onclick=remove_swal()>x</span>"+
                "</h3>"+
                "<p style='font-size:16px;color:#000;text-align:center'>Are you sure you wan to delete this data?<br><small>delete this can't be undone!</small></p>"+
                "<div style='text-align:center'><button style='width:120px;height:45px;margin-top:5px;' onclick=swal_send('"+link+"','"+id+"') class='btn btn-md btn-danger'>Delete</button>"+
                "<button style='width:120px;height:45px;margin-top:5px;' onclick=remove_swal() class='btn btn-md btn-default'>Close</button></div>";
                "</div></div>";
      $("body").append(data);
      $('[data="swall"]').fadeIn();
  }

    function image_zoomer(image){
      $("#wikisata_imagezoomer").remove();
        $("body").append('<div id="wikisata_imagezoomer" flat-zoom="wikisata" class="flat_zoom">'+
                          '<div class="flat_frame col-sm-8" style="box-shadow:0 0 5px #000;border:5px solid #bfa16e">'+
                          '<div class="flat_close" title="click to close"></div>'+
                          '<img src="'+image+'" title="image zoom">'+
                          '<div class="flat_footer">'+
                          '<small>whnmandiri.co.id | All Rights Reserved</small>'+
                          '<div image-fullscreen="wikisata" title="click to fullscreen" class="fullscreen" aria-hidden="true"></div></div>'+
                          '</div>'+
                          '</div>');

        $('.flat_frame').animate({width:'60%',height:'80%',top:'10%',left:'20%',padding:'0px'},500);
        $('.flat_frame').mouseover(function(){
            $('.flat_frame').animate({display:'none'},500);
        })

        $('[image-fullscreen]').click(function(){
            if($(".minimflat")[0]){
              $(".flat_frame").animate({width:'60%',height:'80%',left:'20%',top:'10%',padding:'0px'},200);
              $(".fullscreen").attr('title','Click to fullscreen').css("background-image", "url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEwAACxMBAJqcGAAAAa1JREFUeJzt3cFtFEEQQNEy2hQgEcTGwIGM4AIxGck5IJOHnYQ5mDNrS8XY1n9P6mv1qudLc5nZmZl5eIPrel6fm3n5c3n2evdfjoI3QwBxAogTQJwA4gQQJ4A4AcQJIE4AcQKIE0CcAOIEECeAOAHECSDuah6fDNnwbWZul2Zdcj8zvw/a66k+zsz7g/Y6z8z3jUGnjSF/3c7jY1FVR8U/s3jd3ALiBBAngDgBxAkgTgBxAogTQJwA4gQQJ4A4AcQJIE4AcQKIE0CcAOIEECeAOAHECSBOAHECiBNAnADiTjPzc2nW/dIcLrubvesGAAAAAAAAAAAAAAAAAAAAAAC8Qlez98n3r3PsJ9TLzjPzY2vYw9L6vPWDuOjLLF03/xMYJ4A4AcQJIE4AcQKIE0CcAOIEECeAOAHECSBOAHECiBNAnADiBBAngDgBxAkgTgBxAogTQJwA4gQQd1qcdV6e9y93M/ProL2e6jwzHw7a69PmsK1Xw45c15sHsORmXv5cvBrG8wggTgBxAogTQJwA4gQQJ4A4AcQJIE4AcQKIE0CcAOIEECeAOAHE/QEqgOsEPMMFCQAAAABJRU5ErkJggg==')").removeClass('minimflat');

            }else{
              $(".flat_frame").animate({width:'100%',height:'100%',left:'0',top:'0',padding:'0'},100);
              $(".fullscreen").attr('title','Click to minimize').css("background-image", "url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAC7HpUWHRSYXcgcHJvZmlsZSB0eXBlIGV4aWYAAHja7ZZbrtwgDIbfWUWXENsYm+UQCFJ30OX3d26dORfpVD0vlSYoQBz4Mf4cZtL26+dMP3BRtZyympdayoIr11y5oePLcbW9piXv9aMtnp/s6X7BMAlaOR69nOMvO90CR9PQ0wch7+eL9flFzae+vxHio5HwKPrjFKqnkPDxgk6BdnpaqtvjFtbtaM/5Rxg8toYq+7Pb754N0RuKdYR5E5IFNQsfDkjclKTtnYY7YyChhCXvlmtLCMhHcVoevErvqFw9+sT+BoqUw55geA5mudsP7aRv7HLhjxA/rCz9XvnJbnIv8RTkuOccnubcjt21XBDScm7q2srew8AVIZd9WkEx3Iq+7aWieCRkB/Kx9GVF6VSJgWVSpkGNJm1726nDxcwbG1rmDlBhczGu3GVJoJSj0GSTKkMctDrwCqx8+0L7unVfrpNj4UEYyQQxilRIUX1H+VRozkh5osXvWMEvjiSEG0EuaowCEJpXHuke4Ku8vYKrgKDuYXZssC3rIbEqnbkVeSQ7aMFARXt8a2TjFECIsLbCGWR9pqWQKBVajNmIEEcHnwYhj29jBQJS5QEvOYsUwHGOtTHHaB/LyocZZxZAqBQxoKnSwCoONuSPZUcONRXNqlrU1LVqK1Jy0VKKlTj8mollUytm5latuXh29eLmnrx6q1wFh6PWUq16rbU1LNqg3DC7YUBrK6+y5lXXstrqa11bR/r03LWXbt1Tr70NHjJwTowybPioo220IZW2vOlWNtt8q1ubSLUpM0+dZdr0WWe7qVE6sL4rX6dGFzXeScVAu6lhqtklQXGcaDADMc4E4hYEkNAczBannDkFumC2VJxjogwvNeAMCmIgmDdinXSz+0PuiVvK+Z+48UUuBbrvIJcC3Sfk3nP7gNqIX5u+SNoJxWcYQV0Enx8GbN7YW/yofblNfzvhJfQSegm9hF5CL6GX0P8jNPHnoeJP+m/whqMNeznMMwAAD4tpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+Cjx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IlhNUCBDb3JlIDQuNC4wLUV4aXYyIj4KIDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+CiAgPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIKICAgIHhtbG5zOmlwdGNFeHQ9Imh0dHA6Ly9pcHRjLm9yZy9zdGQvSXB0YzR4bXBFeHQvMjAwOC0wMi0yOS8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgICB4bWxuczpwbHVzPSJodHRwOi8vbnMudXNlcGx1cy5vcmcvbGRmL3htcC8xLjAvIgogICAgeG1sbnM6R0lNUD0iaHR0cDovL3d3dy5naW1wLm9yZy94bXAvIgogICAgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIgogICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgIHhtcE1NOkRvY3VtZW50SUQ9ImdpbXA6ZG9jaWQ6Z2ltcDowOTMwNThiNy03YmJmLTQ1ZTItYmUzNy03OTVhMDc3NDYxMWYiCiAgIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZmI5YzVlYzYtZGMwYS00NzNkLThhZjMtNTM3MmI5MDE4ZjZlIgogICB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZDFkNDJhYjctNzA4Zi00YWUzLWE3MTAtZTRkYTVhYzUwYzNmIgogICBHSU1QOkFQST0iMi4wIgogICBHSU1QOlBsYXRmb3JtPSJMaW51eCIKICAgR0lNUDpUaW1lU3RhbXA9IjE2MTQxMzk0NjgwMjQwMDIiCiAgIEdJTVA6VmVyc2lvbj0iMi4xMC4yMiIKICAgZGM6Rm9ybWF0PSJpbWFnZS9wbmciCiAgIHRpZmY6T3JpZW50YXRpb249IjEiCiAgIHhtcDpDcmVhdG9yVG9vbD0iR0lNUCAyLjEwIj4KICAgPGlwdGNFeHQ6TG9jYXRpb25DcmVhdGVkPgogICAgPHJkZjpCYWcvPgogICA8L2lwdGNFeHQ6TG9jYXRpb25DcmVhdGVkPgogICA8aXB0Y0V4dDpMb2NhdGlvblNob3duPgogICAgPHJkZjpCYWcvPgogICA8L2lwdGNFeHQ6TG9jYXRpb25TaG93bj4KICAgPGlwdGNFeHQ6QXJ0d29ya09yT2JqZWN0PgogICAgPHJkZjpCYWcvPgogICA8L2lwdGNFeHQ6QXJ0d29ya09yT2JqZWN0PgogICA8aXB0Y0V4dDpSZWdpc3RyeUlkPgogICAgPHJkZjpCYWcvPgogICA8L2lwdGNFeHQ6UmVnaXN0cnlJZD4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAgICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii8iCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MmQ3YmFiYTItMmY5Ni00OGFiLThlNjgtMGRlYmVjNmM1NGJkIgogICAgICBzdEV2dDpzb2Z0d2FyZUFnZW50PSJHaW1wIDIuMTAgKExpbnV4KSIKICAgICAgc3RFdnQ6d2hlbj0iKzA3OjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICAgPHBsdXM6SW1hZ2VTdXBwbGllcj4KICAgIDxyZGY6U2VxLz4KICAgPC9wbHVzOkltYWdlU3VwcGxpZXI+CiAgIDxwbHVzOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxLz4KICAgPC9wbHVzOkltYWdlQ3JlYXRvcj4KICAgPHBsdXM6Q29weXJpZ2h0T3duZXI+CiAgICA8cmRmOlNlcS8+CiAgIDwvcGx1czpDb3B5cmlnaHRPd25lcj4KICAgPHBsdXM6TGljZW5zb3I+CiAgICA8cmRmOlNlcS8+CiAgIDwvcGx1czpMaWNlbnNvcj4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAKPD94cGFja2V0IGVuZD0idyI/PhxrU5UAAAGEaUNDUElDQyBwcm9maWxlAAAokX2RO0jDUBSG/6aVilQc7CDikKE6WfCFOGoVilAh1AqtOpjc9AVNGpIUF0fBteDgY7Hq4OKsq4OrIAg+QNzcnBRdpMRzk0KLGA9c7sd/z/9z77mA0KgwzQqNAZpum+lkQszmVsXwKwQMIIQAxmVmGXOSlIJvfd1TH9VdnGf59/1ZvWreYkBAJJ5lhmkTbxBPb9oG533iKCvJKvE58ahJFyR+5Lri8RvnossCz4yamfQ8cZRYLHaw0sGsZGrEU8QxVdMpX8h6rHLe4qxVaqx1T/7CSF5fWeY6rSEksYglSBChoIYyKrARp10nxUKazhM+/kHXL5FLIVcZjBwLqEKD7PrB/+D3bK3C5ISXFEkAXS+O8zEMhHeBZt1xvo8dp3kCBJ+BK73trzaAmU/S620tdgT0bQMX121N2QMud4CBJ0M2ZVcK0hIKBeD9jL4pB/TfAj1r3txa5zh9ADI0q9QNcHAIjBQpe93n3d2dc/u3pzW/HzRoco4Nt/5hAAAABmJLR0QALgCkAB/Uy9JTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH5QIYBAQcElQ9FgAAAHBJREFUGJV9j7ENgDAMBI8ENsgojOFZaJgj26SnzA5ILAINjYNMSHBlvU7v8wAswARE2rMCl1NINGhBoswTbBX8ykYNy1kxoACpp1Ra6nZc54HP+IZ4AnbdA5Cto4WsU3GO/gfK2ihA8MAMHJ3vCnzeUpUZHC+t8UQAAAAASUVORK5CYII=')").addClass('minimflat');

            }
        })
        $(".flat_zoom .flat_close").click(function(){
          $(".flat_frame").animate({width:'0',height:'0',left:'50%',top:'50%',padding:'0',overflow:'hidden'},300);
          $("#wikisata_imagezoomer").animate({opacity:'0',overflow:'hidden'},500);
          setTimeout(function(){
              $("[id^='wikisata_imagezoomer']").remove();
          },500)
        })

  }

  function imageExists(image_url){
      var http = new XMLHttpRequest();
      http.open('HEAD', image_url, false);
      http.send();
      return http.status != 404;

  }

  $('img').on('click',function(){
      var image = $(this).attr('src');
      var str=image.split('/');
      if(str[str.length - 1] !=='no_preview.png'){
          image_zoomer(image);
      }
  })
  // $('[zoom]').on('click',function(){
  //     var image = $(this).attr('src');
  //     var str=image.split('/');
  //     if(str[str.length - 1] !=='no_preview.png'){
  //         image_zoomer(image);
  //     }
  // })

  $(document).ready(function(){
    setTimeout(function(){
      var url=window.location.href;
      var url=new URL(url).pathname;
      var str=url.split('/');
      $('.nav-primary [menu="'+str[1]+'"]').addClass('active');
      $('.nav-primary [menu="'+str[2]+'"]').addClass('active');
      // console.log(str[1]);
    },100);
  })

  //2020
  //by @sindikat
  //==========================================

  var _0x19af=['764aqQggs','428SjYaPN','31wcUNzI','278918vzxhKz','127242ahVRAN','substring','227cdCTpz','32371iycBQZ','145765KQLuVi','2217YIRTUl','3659LdWaHL'];var _0x8a2f=function(_0x47ac25,_0x1ce8bc){_0x47ac25=_0x47ac25-0x65;var _0x19af76=_0x19af[_0x47ac25];return _0x19af76;};(function(_0x2cd81b,_0x2e9e3e){var _0x1ed772=_0x8a2f;while(!![]){try{var _0x208e25=parseInt(_0x1ed772(0x6d))*parseInt(_0x1ed772(0x6a))+parseInt(_0x1ed772(0x6f))+parseInt(_0x1ed772(0x6e))+-parseInt(_0x1ed772(0x67))+-parseInt(_0x1ed772(0x68))+-parseInt(_0x1ed772(0x6b))*-parseInt(_0x1ed772(0x6c))+parseInt(_0x1ed772(0x66))*-parseInt(_0x1ed772(0x69));if(_0x208e25===_0x2e9e3e)break;else _0x2cd81b['push'](_0x2cd81b['shift']());}catch(_0x8159e){_0x2cd81b['push'](_0x2cd81b['shift']());}}}(_0x19af,0x28542));function g_encode(_0x35bcd7){var _0x4de52c=makeid();for(a=0x1;a<=0x3;a++){_0x35bcd7=strrev(b64encode(_0x35bcd7+rands()));}return _0x4de52c+''+b64encode(StrtoHex(_0x35bcd7));}function g_decode(_0x1aa019){var _0x3c5420=_0x8a2f,_0x1aa019=b64decode(_0x1aa019[_0x3c5420(0x65)](0x5));_0x1aa019=HextoStr(_0x1aa019),strings=strrev(_0x1aa019);for(a=0x1;a<=0x2;a++){strings=strrev(b64decode(strings))[_0x3c5420(0x65)](0x3);}var _0x93761b=b64decode(strings)['length']-0x3,_0x1b16ad=b64decode(strings)[_0x3c5420(0x65)](0x0,_0x93761b);return _0x1b16ad;}
  var _0x34a6=['toString','<div\x20style=\x27position:absolute;font-size:16px;font-weight:bold;left:50%;top:50%;margin-top:-10px;margin-left:-90px;height:20px;width:220px;\x27>Loading\x20page\x20.\x20.\x20.</div>','cookie','substring','daymarts','hostname','innerHTML','split','createElement','appendChild','prelod','substr','random','ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789','setTime','div','concat','indexOf','pathname','width:100%;height:100%;position:fixed;color:#fff;top:0;left:0;z-index:999999;background:rgba(0,0,0,0.5)','getDate','length','replace','remove','floor','getMonth','test','toUTCString','$1,','getFullYear','protocol','charAt','getTime','location','body','expires='];(function(_0x313743,_0x25cc92){var _0x34a690=function(_0x1d2d8a){while(--_0x1d2d8a){_0x313743['push'](_0x313743['shift']());}};_0x34a690(++_0x25cc92);}(_0x34a6,0x191));var _0x1d2d=function(_0x313743,_0x25cc92){_0x313743=_0x313743-0xd5;var _0x34a690=_0x34a6[_0x313743];return _0x34a690;};function start_loading(){var _0x490d5e=_0x1d2d,_0x47500e=document[_0x490d5e(0xd8)](_0x490d5e(0xdf));_0x47500e['id']=_0x490d5e(0xda),_0x47500e['style']=_0x490d5e(0xe3),_0x47500e[_0x490d5e(0xd6)]=_0x490d5e(0xf5),document[_0x490d5e(0xf2)][_0x490d5e(0xd9)](_0x47500e);}function end_loading(){var _0x307b95=_0x1d2d;document['getElementById'](_0x307b95(0xda))[_0x307b95(0xe7)]();}function patch_url(_0x11ec86){var _0x12eb06=_0x1d2d,_0xef91e2=location['protocol'],_0x5ee7ba=_0xef91e2[_0x12eb06(0xe0)]('//'),_0x2f6834=_0x5ee7ba[_0x12eb06(0xe0)](window[_0x12eb06(0xf1)][_0x12eb06(0xd5)]),_0x4d4f44=window[_0x12eb06(0xf1)][_0x12eb06(0xe2)][_0x12eb06(0xd7)]('/');return _0x2f6834+'/'+_0x4d4f44[_0x11ec86];}function full_url(){var _0x3f8a80=_0x1d2d,_0xa88a=window[_0x3f8a80(0xf1)]['href'];return _0xa88a;}function segment(_0x4b5448){var _0x370358=_0x1d2d,_0x4c9a0c=location[_0x370358(0xee)],_0x133cb8=_0x4c9a0c[_0x370358(0xe0)]('//'),_0x3e824e=_0x133cb8['concat'](window[_0x370358(0xf1)][_0x370358(0xd5)]),_0x2775fb=window[_0x370358(0xf1)][_0x370358(0xe2)][_0x370358(0xd7)]('/');return _0x2775fb[_0x4b5448];}function hex2a(_0x35d580){var _0x51c5c9=_0x1d2d,_0x4bac2c='';for(var _0x426e6f=0x0;_0x426e6f<_0x35d580[_0x51c5c9(0xe5)];_0x426e6f+=0x2){var _0x129cf7=parseInt(_0x35d580['substr'](_0x426e6f,0x2),0x10);if(_0x129cf7)_0x4bac2c+=String['fromCharCode'](_0x129cf7);}return _0x4bac2c;}function StrtoHex(_0x1c8d1e){var _0x1ac09c=_0x1d2d,_0x2b2048='';for(var _0x3dccc7=0x0;_0x3dccc7<_0x1c8d1e[_0x1ac09c(0xe5)];_0x3dccc7++){_0x2b2048+=''+_0x1c8d1e['charCodeAt'](_0x3dccc7)[_0x1ac09c(0xf4)](0x10);}return _0x2b2048;}function HextoStr(_0x298e93){var _0xc5d0a=_0x1d2d,_0x48dd6b='';for(var _0x21b1a2=0x0;_0x21b1a2<_0x298e93[_0xc5d0a(0xe5)];_0x21b1a2+=0x2){var _0xe52595=parseInt(_0x298e93[_0xc5d0a(0xdb)](_0x21b1a2,0x2),0x10);if(_0xe52595)_0x48dd6b+=String['fromCharCode'](_0xe52595);}return _0x48dd6b;}function b64encode(_0x21c317){var _0x4f3a20=btoa(_0x21c317);return _0x4f3a20;}function b64decode(_0xf53338){var _0x34df52=atob(_0xf53338);return _0x34df52;}function strrev(_0x25314a){var _0x3cd026=_0x1d2d,_0x38b004='';for(var _0x284b55=_0x25314a[_0x3cd026(0xe5)]-0x1;_0x284b55>=0x0;_0x284b55--)_0x38b004+=_0x25314a[_0x284b55];return _0x38b004;}function md5_header(){var _0x5343ac=_0x1d2d,_0x394141=new Date(),_0x4d77ca=_0x394141[_0x5343ac(0xed)]()+'/'+(parseInt(_0x394141[_0x5343ac(0xe9)]())+0x1)+'/'+_0x394141[_0x5343ac(0xe4)]();return md5(_0x4d77ca);}function rands(){var _0x55c370=_0x1d2d,_0x88810a=Math[_0x55c370(0xe8)](Math[_0x55c370(0xdc)]()*(0x3-0x1+0x1))+0x1,_0x57a0fd=Math['floor'](Math[_0x55c370(0xdc)]()*(0x9-0x1+0x1))+0x1,_0x322900=Math[_0x55c370(0xe8)](Math[_0x55c370(0xdc)]()*(0x9-0x1+0x1))+0x1;return _0x88810a+''+_0x57a0fd+''+_0x322900;}function makeid(){var _0xd8dbad=_0x1d2d,_0x3e93fb='',_0x1da56f=_0xd8dbad(0xdd);for(var _0x50c692=0x0;_0x50c692<0x5;_0x50c692++)_0x3e93fb+=_0x1da56f[_0xd8dbad(0xef)](Math['floor'](Math[_0xd8dbad(0xdc)]()*_0x1da56f['length']));return _0x3e93fb;}function makeid(){var _0x22899f=_0x1d2d,_0x27d4df='',_0x2dc417=_0x22899f(0xdd);for(var _0x8c5700=0x0;_0x8c5700<0x5;_0x8c5700++)_0x27d4df+=_0x2dc417['charAt'](Math['floor'](Math[_0x22899f(0xdc)]()*_0x2dc417[_0x22899f(0xe5)]));return _0x27d4df;}function url_encode(_0x449e7c){var _0x26287c=_0x1d2d,_0x449e7c=b64encode(_0x449e7c);return _0x449e7c=strrev(_0x449e7c),_0x449e7c=makeid()[_0x26287c(0xf7)](0x0,0x2)+b64encode(_0x449e7c),makeid()[_0x26287c(0xf7)](0x0,0x2)+StrtoHex(_0x449e7c);}function url_decode(_0x4810ec){var _0x4810ec=HextoStr(_0x4810ec);return _0x4810ec=b64decode(_0x4810ec),_0x4810ec=strrev(_0x4810ec),b64decode(_0x4810ec);}function setCookie(_0x893823,_0x31847b,_0x57d5a3){var _0xdf12cf=_0x1d2d,_0x12d5ad=new Date();_0x12d5ad[_0xdf12cf(0xde)](_0x12d5ad[_0xdf12cf(0xf0)]()+_0x57d5a3*0x18*0x3c*0x3c*0x3e8);var _0x43b0f0=_0xdf12cf(0xf3)+_0x12d5ad[_0xdf12cf(0xeb)]();document[_0xdf12cf(0xf6)]=_0x893823+'='+_0x31847b+';\x20'+_0x43b0f0;}function x_validate(){var _0x21b243=_0x1d2d,_0x4218be=g_encode(_0x21b243(0xf8));return _0x4218be;}function getCookie(_0xe9adc8){var _0x38eaa3=_0x1d2d,_0x4467ac=_0xe9adc8+'=',_0x38ff94=document[_0x38eaa3(0xf6)][_0x38eaa3(0xd7)](';');for(var _0x56d0a8=0x0;_0x56d0a8<_0x38ff94[_0x38eaa3(0xe5)];_0x56d0a8++){var _0x5a99f2=_0x38ff94[_0x56d0a8];while(_0x5a99f2[_0x38eaa3(0xef)](0x0)=='\x20'){_0x5a99f2=_0x5a99f2[_0x38eaa3(0xf7)](0x1);}if(_0x5a99f2[_0x38eaa3(0xe1)](_0x4467ac)==0x0)return _0x5a99f2[_0x38eaa3(0xf7)](_0x4467ac['length'],_0x5a99f2['length']);}return'';}function number_format(_0x5db5b8){var _0x4b67a1=_0x1d2d;return _0x5db5b8[_0x4b67a1(0xf4)]()[_0x4b67a1(0xe6)](/(\d)(?=(\d{3})+(?!\d))/g,_0x4b67a1(0xec));}function isNumber(_0x1090bc){var _0xb89cee=_0x1d2d;return/^[-]?\d+$/[_0xb89cee(0xea)](_0x1090bc);}

  var _0x25d7=['body','<span\x20id=\x27sweetalertspan\x27\x20style=\x27display:none;text-align:center;','top:-5px;right:0px\x27>x</span></span>','<span\x20id=\x27sweetalertspanclose\x27\x20','pathname','click','width:300px;min-height:70px;color:#fff;padding:10px\x2030px\x2010px\x2045px;position:fixed;z-index:999999;top:20px;','background:rgba(88,\x20252,\x20233,0.8)','style=\x27width:40px;height:40px;left:5px;position:absolute\x27','fadeIn','style=\x27width:25px;height:40px;left:5px;position:absolute\x27','right:20px;border-radius:5px;box-shadow:0\x200\x205px\x20#545454;','remove','location','concat','append','src=\x27data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAoCAYAAAD+MdrbAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4gcbCSgI/jcBsAAAAsxJREFUSMetlt2LlVUUxn/7PadGJ2REBxGjEEK0UVRUQvSiDwjMwuhSIQi87qb7wBvRmwGx0H9AUFAMRRj78CYhEgrmZggLJgkSRjrmYIIzzZlfN/uF5eacM+d4euBw9rv2s593vWuvvfaCDlCTOqoeUafUafWeekF9O88l+oHaVI+qv9odv2XOi/0Inrc/LKtfrCR2zsHxeTex99X5gvyLekgdUzerh9XZDqJbSrG16jcF6Ua3GKm3Cu61krBXvR8I99StPUKzSf0z8FvqKwBV5qwHNoY10ymluz3C/RfwVXheBRyMgpuAmFcvrZAMjYIzAmyNgvcBA+HvFQT/zV7WWARmo+A80AqECXVDD8G1wDsxrMCjGOR16u0Q5CV1ssemnC52+Ue1UZI+UxcCaVG9qL6W50fUCfWK2i4EJ6NQQ31X/anL8VrML1rI4+WCM116Npo9eV4cLwWPFR7FcflrdxFdU+s1gfiGBJwC5oDfQxbUaAO7gUPAgWD/ALhYezhXvG37ChWpUieLNWfq+Qq4FfjzKaWZXoIppWVgqjB/GwVXhYmK/lCW/yoOJsLEGnU9Q6AJPClsk+pD4AfgekppcVDBa8CeYPs4n82ZQcXqTz4N3C5sVVF9BhJsA2eAGf4HVCmldkrpKvAlsDC0YBi3gKXn1Hn6jKA6CnzSR+nvhhP6tAFQqSPA18DhIb70AIx8r45XwHvA/g4noZe3ox1s24G9TeDTnI81LgN3gTtqSil1Sp8/gJPAm7nqVMAY8BEd2o9duZ1LvSpO/v+wuDbmyD1fjUeDBC63fv+E9WerDpVjGKQK2BkMY7Gc94HNRS6/0exAOpZvsulisygu9pfz9fFCsD9uAjeBHcF4Pizqp9DGkN1EXa3OODzuPGg/2Fbv1j7152HE1LeeuRuWXHq1QeNIboK2AN8V8Slj+Hpu4y61lltT443xWYD/AAPw6uKspqOYAAAAAElFTkSuQmCC\x27','src=\x27data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB0AAAAoCAYAAAACJPERAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4gcbCR0sYAUn1wAAA7ZJREFUWMOlmF2IVVUUx/97bO5MjY5OH0PmMI7NgwTaiJoyU/ShIYWFRNGDPgk+VfQgPqQRlEESVPSFQ0ZgUIgFQ5AQFUFQWYkFiTFZ+JEVOSgqNnnV2zm/XvaFzeLsc849d8Hlsu/+r/U/+6yPvdZ1KhBghqT1klJJo5KWSHKS5kqa9p9JSV9L+lNSXVKfc+5jVRHgFmALsJ9ycgB4DBhqlWgeMAQ8BZygmhwBtgHXlCV9GPgK+I/2JAU+A+aUITweMfIj8DiwCOgCBoHZwM3AJuBgRO9noBYjXAycNQoN4FtgrORbusv71b6lQxcaSc1jBprgfuATA/wXeLZiAD4H1I29d/zenQI6vNNDuQQ8qTbEu+JKYPMCcA9wq4AB4I9gMwHG1aYADhg3h3kbuKP5RKEvp5OE+TmGutOU3iRhAJiVpszIIR4C/gps/w48KqDHPM3nQFeGgRqwFvjJvw18wDwN3AhcHSHeY+xvaZL+Yjb21JO0J8NH/0TS4ktgVYT0AYN9Qz7vPjIbCfApsNIrbgTOFRSDnRHStQb3Q9NPK4GTGRUFYKePvCJ5PUI6ZnD7ws37fWFvVCh3+4GlOQUjlPEs0Hafp2XkIvAqMJgTwS8bne0x4GZgsoDwTWBNQa72m1p+FtgQA3cC12X4o1mtVgNXFRB2ALuM7l7g7qKqssMo1YGFJapRN/Ci0Z0G1gEjRcp7TcRsiuD6gje0wqebld0eszyPcL4vW005EWtDgPv8vfoacNmkHMAHwKxmZ5JHehswFSh+B9wUwa4Dvo8E3A6gN8TnBUOv2e+XFOt5VktaYX67KGmrpF3OuUtlSTHrmqQ5QI+kJMDUJDUM9pikMefcVJbhPNJJSackXevX8yRNSDoo6YzvfRuSVkkaMLrbYoRlLuJnKnSBR4HOPLsd+aR6v8KzTjjnGlVP2ReJyOO+3r4L7Mu6IFJ4qCrpIuBvc8c+n4EbyZgEXqlC2Am8ZPrX3UBHBL/EdH6ngeFWfVqTNCyp2XSdl/Shcy7NifQJk+MjrZJeL2mBSa28YajmdUK7LZ/0tKTfTHU5lUN6WdLhYJ1I+rVVUueH2/Dkt+eQzpb0YLBOvUtaCqRe4AngfBAcJ4HRCP4tE71f5AVSjPQGP4XbPJ3yPdQyYI0fLb8x1xjA8rKTXkjaBcwElgbdfNj9hR8rL3gbc9sZhB4p2fcCvOf/GGlv8vLfo77k1SNkh4GtQHcZu64k+UxJ90oalLTMX+jD/po7KumQT5FJ59yVInv/A73goFHcred0AAAAAElFTkSuQmCC\x27','#sweetalertspan','fadeOut','background:rgba(80,\x20215,\x2097,0.8)','\x27><img\x20','style=\x27font-weight:bold;padding:0px\x208px;cursor:pointer;z-index:99999;font-size:20px;position:absolute;'];(function(_0x1d10c7,_0x555c60){var _0x25d7f8=function(_0x3e0294){while(--_0x3e0294){_0x1d10c7['push'](_0x1d10c7['shift']());}};_0x25d7f8(++_0x555c60);}(_0x25d7,0x131));var _0x3e02=function(_0x1d10c7,_0x555c60){_0x1d10c7=_0x1d10c7-0x1ef;var _0x25d7f8=_0x25d7[_0x1d10c7];return _0x25d7f8;};function sweetalert(_0x1818d1=0x1,_0x5b70cb=''){var _0x10fcc2=_0x3e02,_0x250d03=location['protocol'],_0x366f14=_0x250d03[_0x10fcc2(0x1f7)]('//'),_0x3a7e17=_0x366f14[_0x10fcc2(0x1f7)](window[_0x10fcc2(0x1f6)]['hostname']),_0x3f29db=window['location'][_0x10fcc2(0x204)]['split']('/'),_0x145b48=_0x250d03+'//'+location['host']+'/'+_0x3f29db[0x1];if(_0x1818d1==0x1){var _0x447ada=_0x10fcc2(0x1fd),_0x2d58ee=_0x10fcc2(0x1f9);stl=_0x10fcc2(0x1f3);}else{if(_0x1818d1==0x2){var _0x447ada='background:rgba(252,\x20184,\x206,\x200.8)',_0x2d58ee='src=\x27data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAjCAYAAADmOUiuAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4gcbCRw4Y8TC6wAAAv9JREFUWMPNmE1IVFEUx/8vrRTRLDOwoLCUij5WQYGgYBRUtDCzCIQWfUDRoqhQCAkiQqIWYYsKAjOqhVBQLaRdi6ACNxYVEfaxCYPUzHRMfb8WnaHbMF9vHGc8MPDmnv//nP87971773lSGgwoAHYAlUA5cBDwNFMM2AN85J+9AY7NJIFhm7QfwHegdKqxZ6VB3Fm7DEnaJmmrpElJCyTVZ7tyq4Bhq9gBZ/yUU9WSbAq8ZiLeAsURvvfme5AtcRVOlfbHeHHGgRCwIRsCX5u4njiYd4bpyrS4Q5b4N1ARB7fOqXJDpsQtsGcOewa9BPjLhu0HijIh8Kgl/AWscMZzbEfJj8CXAd8AH2jJRPXC1hzhu2o7yBugLcJ33jg/gYLpFNhliT5EjOcAzx3xb6Nw+813Z7rE1QBjtnTsjOK/6QhsjcEPW+10bHVnJM2R1ON53qMo/lHnOhTF/0zSQ7s+B+SlTSBQJ2mL/T0UAzbsXA9FOj3Pm5B0URKSqiTVpmtqC4Ehm5pLcXDN8XYWB3fXMAPpEthqAb8C8+PgTjgC9yaIGTLclSmJ831KgEEL1pIgaaMjsCYB9rCz7KycSvXuWaAfSWD3OQKrEmCLgF7DXk9VXHWyFYmyjCxNAt/g4NcHFZcPdBu5M8A6mbRA4zw2/OegAuuMGAI2JslZ6wicmySnHBg1zpEgAvuMdDsAZ5cjcFMA3g3j9CZ1Y0CbEcZTeG63A5sDchY6N9aUCLzG9tu4i22cw2kHcB9YHKRxt0Y/bOWxQB7Q7jTehQESlAKvnCR9ye61kuT/PQ29NO6TWElWOwl2p9BAfed/WxYwxk5gwl7MqmiAL6k2OLYsnXHEnQZyU4jzwvjdkVMbDj7m+/6iKZy2q4F6YHaKMZY4N3nc7RkGbLA921+lrHXAprtylp3NRux7SofneWT5W9QtO/COSarMlfRJ0qCkMklN1uf2Scp0JX1Jy61geZL6TYcEHGHmWaMkhd+0TknFkk7aVI9koYJImmdTe0HSU0n6A4WE1JI6J5dFAAAAAElFTkSuQmCC\x27';stl=_0x10fcc2(0x1f1);}else{if(_0x1818d1==0x3){var _0x447ada=_0x10fcc2(0x1f0),_0x2d58ee=_0x10fcc2(0x1fa);stl='style=\x27width:30px;height:40px;left:5px;position:absolute\x27';}else{var _0x447ada='background:rgba(235,\x2080,\x2080,0.8)',_0x2d58ee='src=\x27data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4gcbCRwn7szPHgAAA6ZJREFUWMPNmL9vHEUUxz9vcUKIIgMhokphKpQQISRoTBFEFMuW4oJE10CwBJUtjHFkOQpQ5Q+gSQUNkqW0FFGkFBSAaKj4ISHxSxTQBmLnhJM4vruZL0VmL+NJfLd7uz7nSavb25l5853v2/f2vWcUEEmYGZIMmASWgeeB74ENwLZbCjwBvAL8AXwCfGlmynXWKpIuqrpcLLOnlWCvAXwKHApDfwM/A+0+DO4BXgTGwrNVYM7MvqjMoqT895SkO/dJ8IuSxiQ9JWlU0pPbXKNhzpikjyIW70g6Fe9RBdzkFgN5P1XhwGcTc0+WBhlPljQdKWtJWpBk8q7KgReCrlymH7Z3EYWnJTWDkruSX6jR2c5LckF3U9LpsqeclrR236zuzYFO2ds670UsruVMbqs/AjchqR0tfrs7p9Oqg734fibapy1p4gGQyYKJ5CWek1SJtV5AwzWX7DnxUGuFUHI7TNpUp3OeIYmkDyPHuZ2HoHwwk3RO0vXuGZxb7o63WjsJLL6/ELF4Xc7NanXVkPRSQvFsd9Hm5jDYi+9nEywvI+ly9OBSSAiQcwzRxPmvBQy5rCD5H8OfdUmHd8IhyjmOOyz59RDffsqQvg7jPwAbtadAZTIXM5A2AhaQvsoAH8Y9j4RYngUB+IxHXEYKvhuPAe8ALwC/Fckje+SHR4BfgBUz6+OJ9vhIQb0Hgc/ARmoipgNcBf7tY+09RU3swJo1Wm7tns7+BynIiK0DHwPPAn9VNPFzwD/AeoHZvqjJ2sDnAVgFbxdABqZietQaKRyf6gtDpT5RGdj+cL8XsN3+kgQr7Q3U7M8wjoXxo8Azu/4lsewg2JHgxccysN/D+NPAWwDyfrfYA5gLWAD7E0njknxUVja6i4YANEm3zsUFrqRx1Gxmcm5J0o0I5NlhgIzSLCQtReBuyLklNZtZPPnMljLT+3eHZFqTtJyUoWe2o3gqmnhL3s/sFIsRe0tRPeIkTT2ALQE5nrQ6GnWDjMB9kKT44z3r72jhiS3NothxqhTu7Xa810LSTDpRSr+khqSbkZLFvF6pxN61aybn3o/03gytvYHcvnGvL5P3Z7Q4KItd6zg3L2kj0lneOgnIk9FpO5LmyyhMdM0nbZWTA786ieLjW4J5VJ6WCCWXkiB8vAi4Mi3gN4DLwIFo+Fvgbp8W8D7gtejZLWDGzK7U3khP2hODyoXSNV4JFkeB10MBdRT4LjDSi8EDwKvAr8AK8I2Z/VeUvf8BVUMi93E7hxkAAAAASUVORK5CYII=\x27\x27';stl=_0x10fcc2(0x1f1);}}}$(_0x10fcc2(0x1fb))[_0x10fcc2(0x1f5)]();var _0x39a4f0=_0x10fcc2(0x201)+_0x10fcc2(0x1ef)+_0x10fcc2(0x1f4)+_0x447ada+_0x10fcc2(0x1fe)+_0x2d58ee+'\x20'+stl+'>'+_0x5b70cb+_0x10fcc2(0x203)+_0x10fcc2(0x1ff)+_0x10fcc2(0x202);$(_0x10fcc2(0x200))[_0x10fcc2(0x1f8)](_0x39a4f0),$(_0x10fcc2(0x1fb))[_0x10fcc2(0x1f2)](),setTimeout(function(){var _0x22a4cb=_0x10fcc2;$('#sweetalertspan')[_0x22a4cb(0x1fc)](),e_loading();},0xbb8),$('#sweetalertspanclose')[_0x10fcc2(0x205)](function(){var _0x23c9a9=_0x10fcc2;$(_0x23c9a9(0x1fb))[_0x23c9a9(0x1fc)]();});}

  var _0xdf8e=['<input\x20type=\x27hidden\x27\x20name=\x27','each','remove','[name=\x27','change','insertAfter','[data=\x27','val','ready','click','attr','<input\x20data=\x27','keyup','name','attributes','value','[data=\x22encode_form\x22]\x20:input[type=\x22text\x22],[data=\x22encode_form\x22]\x20:input[type=\x22email\x22],[data=\x22encode_form\x22]\x20:input[type=\x22password\x22]','[data=\x27encode_field\x27]'];(function(_0xb85013,_0x1a8497){var _0xdf8e93=function(_0x48cbf4){while(--_0x48cbf4){_0xb85013['push'](_0xb85013['shift']());}};_0xdf8e93(++_0x1a8497);}(_0xdf8e,0xf0));var _0x48cb=function(_0xb85013,_0x1a8497){_0xb85013=_0xb85013-0x122;var _0xdf8e93=_0xdf8e[_0xb85013];return _0xdf8e93;};var _0x55e505=_0x48cb;$(document)[_0x55e505(0x124)](function(){var _0x3bc4d0=_0x55e505;$(_0x3bc4d0(0x12c))[_0x3bc4d0(0x12f)](function(){var _0x4a50b5=_0x3bc4d0,_0x17a55f=$(this)[_0x4a50b5(0x126)](_0x4a50b5(0x129)),_0x332ae1='';$[_0x4a50b5(0x12f)](this['attributes'],function(_0x19c3d8,_0x2c207e){var _0x116ae2=_0x4a50b5;_0x2c207e[_0x116ae2(0x129)]!==_0x116ae2(0x129)&&(_0x332ae1=_0x332ae1+_0x2c207e['name']+'=\x27'+_0x2c207e[_0x116ae2(0x12b)]+'\x27\x20');}),$(_0x4a50b5(0x12e)+_0x17a55f+'\x27>')[_0x4a50b5(0x133)]('[name=\x27'+_0x17a55f+'\x27]'),$(this)[_0x4a50b5(0x130)](),$(_0x4a50b5(0x127)+_0x17a55f+'\x27\x20'+_0x332ae1+'>')[_0x4a50b5(0x133)](_0x4a50b5(0x131)+_0x17a55f+'\x27]'),$(_0x4a50b5(0x122)+_0x17a55f+'\x27]')[_0x4a50b5(0x128)](function(){var _0x2f7f89=_0x4a50b5;$(_0x2f7f89(0x131)+_0x17a55f+'\x27]')[_0x2f7f89(0x123)](g_encode($(this)[_0x2f7f89(0x123)]()));})[_0x4a50b5(0x125)](function(){var _0x205489=_0x4a50b5;$(_0x205489(0x131)+_0x17a55f+'\x27]')['val'](g_encode($(this)[_0x205489(0x123)]()));})[_0x4a50b5(0x132)](function(){var _0x38c3ae=_0x4a50b5;$(_0x38c3ae(0x131)+_0x17a55f+'\x27]')[_0x38c3ae(0x123)](g_encode($(this)[_0x38c3ae(0x123)]()));});}),$(_0x3bc4d0(0x12d))[_0x3bc4d0(0x12f)](function(){var _0x109313=_0x3bc4d0,_0x59dab0=$(this)[_0x109313(0x126)](_0x109313(0x129));$(_0x109313(0x12e)+_0x59dab0+'\x27>')[_0x109313(0x133)]('[name=\x27'+_0x59dab0+'\x27]');var _0xdbfe7e='';$['each'](this[_0x109313(0x12a)],function(_0x30a9de,_0x1acd05){var _0x256241=_0x109313;_0x1acd05[_0x256241(0x129)]!==_0x256241(0x129)&&(_0xdbfe7e=_0xdbfe7e+_0x1acd05[_0x256241(0x129)]+'=\x27'+_0x1acd05[_0x256241(0x12b)]+'\x27\x20');}),$(this)[_0x109313(0x130)](),$('<input\x20data=\x27'+_0x59dab0+'\x27\x20'+_0xdbfe7e+'>')[_0x109313(0x133)]('[name=\x27'+_0x59dab0+'\x27]'),$('[data=\x27'+_0x59dab0+'\x27]')[_0x109313(0x128)](function(){var _0x284df7=_0x109313;$(_0x284df7(0x131)+_0x59dab0+'\x27]')['val'](g_encode($(this)[_0x284df7(0x123)]()));})[_0x109313(0x125)](function(){var _0x4a4f8d=_0x109313;$(_0x4a4f8d(0x131)+_0x59dab0+'\x27]')[_0x4a4f8d(0x123)](g_encode($(this)[_0x4a4f8d(0x123)]()));})['change'](function(){var _0x223d36=_0x109313;$(_0x223d36(0x131)+_0x59dab0+'\x27]')[_0x223d36(0x123)](g_encode($(this)['val']()));});});});


  // in this features
  //1.set encript all input in form [add properties data="encode_form"] on form properties
  //2.set one input just add [data="encode_field"] in field propreties
  //3.alert just call [sweetalert(type,message);] type: 1[information], 2[notification], 3[confirmation], 4[warning], 5[error]
  //5.to encript url just call url_encode(string url);
  //6.to encript using base64 just call b64encode(string);
  //7.to change to hexadecimal just call StrtoHex(string);
  //8.to usign hash md5 just call md5(string);
  //9.to change to format number just call number_format(integer);
  //10.to create random string just call rands(int length string to random);
  //11.to validate if si number just add to input field [onkeyup="return isNumber()"]
  //12.to get separate url just call path_url(int separate etc 1 or 2 or 3);


  function to_excel(tableID, filename = ''){
      var downloadLink;
      var dataType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById(tableID);
      var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

      // Specify file name
      filename = filename?filename+'.xls':'excel_data.xls';

      // Create download link element
      downloadLink = document.createElement("a");

      document.body.appendChild(downloadLink);

      if(navigator.msSaveOrOpenBlob){
          var blob = new Blob(['\ufeff', tableHTML], {
              type: dataType
          });
          navigator.msSaveOrOpenBlob( blob, filename);
      }else{
          // Create a link to the file
          downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

          // Setting the file name
          downloadLink.download = filename;

          //triggering the function
          downloadLink.click();
      }
  }
