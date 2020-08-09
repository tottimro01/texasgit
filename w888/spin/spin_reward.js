// Copyright (c) 2020 by Sumesh KP (https://codepen.io/sumeshkp18/pen/VGBPYg)
// 
function CreateSpinGame(e_win, e_lose){
    var chart = document.getElementById("chart");
    var box_w = 400,
        box_h = 450,
        padding = {top:40, right:20, bottom:20, left:20},
        w = box_w - padding.left - padding.right,
        h = box_h - padding.top  - padding.bottom,
        r = Math.min(w, h)/2,
        rotation = 0,
        oldrotation = 0,
        picked = 100000,
        color = d3.scale.category20(),
        button_radius = 80;
    chart.style.width = box_w+'px';
    chart.style.height = box_h+'px';

    var data = [
        {"label":"0฿",      "value":0,      }, 
        {"label":"200฿",    "value":200, }, 
        {"label":"500฿",    "value":500, }, 
        {"label":"10000฿",  "value":10000, }, 
        {"label":"5000฿",   "value":5000, }, 
        {"label":"1000฿",   "value":1000, }, 
        {"label":"50฿",     "value":50, }, 
        {"label":"100฿",    "value":100, },       
    ];

    var svg = d3.select('#chart')
        .append("svg")
        .data([data])
        .attr("width",  w + padding.left + padding.right)
        .attr("height", h + padding.top + padding.bottom);

    var arrowBg = svg.append('defs')
        .append("pattern")
        .attr("id", "arrow-bg")
        .attr("patternUnits", "userSpaceOnUse")
        .attr("width", "60")
        .attr("height", "60")
        .append("image")
        .attr("xlink:href", "spin/img/g5.png")
        .attr("x", "0")
        .attr("y", "0")
        .attr("width", "100")
        .attr("height", "100")

    var buttonBg = svg.append('defs')
        .append("pattern")
        .attr("id", "button-bg")
        .attr("patternUnits", "userSpaceOnUse")
        .attr("width", button_radius*2)
        .attr("height", button_radius*2)
        .attr("x", 240)
        .attr("y", 240)
        .append("image")
        .attr("xlink:href", "spin/img/Spin-logo.gif")
        .attr("x", "0")
        .attr("y", "0")
        .attr("width", button_radius*2)
        .attr("height", button_radius*2)

    var container = svg.append("g")
        .attr("class", "chartholder")
        .attr("transform", "translate(" + (w/2 + padding.left) + "," + (h/2 + padding.top) + ")");

    var vis = container.append("g");
    
    var pie = d3.layout.pie().sort(null).value(function(d){return 1;});
    // declare an arc generator function
    var arc = d3.svg.arc().outerRadius(r);
    // select paths, use arc generator to draw
    var arcs = vis.selectAll("g.slice")
        .data(pie)
        .enter()
        .append("g")
        .attr("class", "slice");
    
    arcs.append("path")
        .attr("fill", function(d, i){ 
            if(i%2==0)
                return '#58585a';
            return '#3a393c';
        })
        .attr("d", function (d) { return arc(d); })
        .attr("stroke", "#333235" );

    // add the text
    arcs.append("g").attr("transform", function(d, i){
        d.innerRadius = 0;
        d.outerRadius = r;
        d.angle = (d.startAngle + d.endAngle)/2;
        return "rotate(" + ((d.angle * 180 / Math.PI - 90)+1) + ") translate(" + ((d.outerRadius -50)) +" "+(0)+")";
    })
    .append("text")
        .attr("text-anchor", "middle")
        .attr("fill", "white")
        .attr("transform", "rotate(90)")
        .style({"font-weight":"bold", "font-size":"25px"})
        .text( function(d, i) {        
        return data[i].label;
    });
    //make arrow
    svg.append("g")
        // .attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h/2)+padding.top) + ")")
        .attr("transform", "translate(" + ((w + padding.left + padding.right)/2) + "," + padding.top + ")")
        .append("path")
        .attr("d", "M-" + (r*.25) + ",0L0," + (r*.15) + "L0,-" + (r*.15) + "Z")
        // .style({"fill":"black", "transform": "rotate(-90deg)"});
        .style({"fill":"url(#arrow-bg)", "transform": "rotate(-90deg)"});
    
    //draw spin circle
    var spinButton = container.append("circle")
        .attr("cx", 0)
        .attr("cy", 0)
        .attr("r", button_radius)
        .style({"fill":"url(#button-bg)","cursor":"pointer"});
    //spin text
    // container.append("text")
    //     .attr("x", 0)
    //     .attr("y", 15)
    //     .attr("text-anchor", "middle")
    //     .text("OHO88")
    //     .style({"font-weight":"bold", "font-size":"30px"});

    spinButton.on("click", spin);
    var res_amount = document.getElementById('spin_reward_amount');
    var b = [e_win, e_lose];
    for(var h = 0; h < b.length; h++){
    	b[h].addEventListener("click", closeResultDialog)
  //   	for(var i = 0; i < b[h].children.length; i++){
		// 	if(b[h].children[i].classList.contains('close-spin-res')){
		// 		for(var j = 0; j < b[h].children[i].children.length; j++){
		// 			if(b[h].children[i].children[j].tagName.toLowerCase() == 'button'){
		// 				b[h].children[i].children[j].addEventListener("click", closeResultDialog)
		// 			}
		// 		}
		// 	}
		// }
    }
// for(var i = 0; i < e_win.children.length; i++){
// }
    function closeResultDialog(){
		e_win.style.display = 'none';
		e_lose.style.display = 'none';
    }
    
    // e_win.children.forEach( function(element, index) {
    // 	console.log(element)
    // });
    function spin(d){
        
        spinButton.on("click", null);
        var ps       = 360/data.length,
            pieslice = Math.round(1440/data.length),
            rng      = Math.floor((Math.random() * 1440) + 360);
            
        rotation = (Math.round(rng / ps) * ps);
        
        picked = Math.round(data.length - (rotation % 360)/ps);
        picked = picked >= data.length ? (picked % data.length) : picked;
    
        rotation += 0 - Math.round(ps/2);
        vis.transition()
        .duration(3000)
        .attrTween("transform", rotTween)
        .each("end", function(){
            oldrotation = rotation;
            /* Get the result value from object "data" */
            $.ajax({
                url: 'spin/submit_spin_result.php',
                type: 'post',
                dataType: 'json',
                data: {reward: data[picked].value},
            })
            .done(function(res){
                console.log(res);
                if(res.status == 1){
                	res_amount.innerHTML = res.reward;
					e_win.style.display = 'block';
                }else{
					e_lose.style.display = 'block';
                }
            })
            .fail(function(){
                console.log("error");
            })
            .always(function(){
                console.log(data[picked].value);
                /* Comment the below line for restrict spin to sngle time */
                spinButton.on("click", spin);
            });
        });
    }

    function rotTween(to) {
        var i = d3.interpolate(oldrotation % 360, rotation);
        return function(t) {
            return "rotate(" + i(t) + ")";
        };
    }


    function getRandomNumbers(){
        var array = new Uint16Array(1000);
        var scale = d3.scale.linear().range([360, 1440]).domain([0, 100000]);
        if(window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function"){
            window.crypto.getRandomValues(array);
            console.log("works");
        } else {
            //no support for crypto, get crappy random numbers
            for(var i=0; i < 1000; i++){
                array[i] = Math.floor(Math.random() * 100000) + 1;
            }
        }
        return array;
    }
}

