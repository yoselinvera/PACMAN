<!-- Teclas usadas
Avanzar adelante: Flecha adelante
Avanzar atras: Flecha atras
Salto vertical: Flecha arriba
Salto adelante: Shift derecho -->



<html>
<header>
</header>
<body>
<div>
    <h4>Ejemplos basicos bonsai JS</h4>
</div>
<div id="bonsai"></div>
</body>
<footer>
    <script src="{{ asset('js/bonsai-0.4.1.min.js') }}"></script>
    <script>
        bonsai.run(document.getElementById('bonsai'), {
            code: function() {
                var eye = new Circle(10,-35,7)
                    .attr('fillColor', '#fff');
                var on  = 'l 60 0 L 60 0 A 60 60 0 1 1 48.54 -35.26';
                var off = 'l 60 0 L 60 0 A 60 60 0 1 1 60 -0.0001';
                var pm = new bonsai.Path().attr('fillColor', 'red');

                var pacman = new Group()
                    .attr({'y': 100, 'rotation': 0.1}).addTo(stage);
                pacman.addChild.call(pacman, [pm, eye]);

                var i = 0;
                (function loop(e) {
                    setTimeout(loop, 150);
                    pm.path(i%2 ? on : off);
                    i++;
                })();
                stage.on('keydown', function(e) {

                    console.log(e.keyCode)
                    console.log("ADELANTE");
                    if (e.keyCode==39){
                        pacman.attr({
                            x: pacman.attr('x')+2
                        })
                    }
                    else if (e.keyCode==37){
                        console.log("ATRAS");
                        pacman.attr({
                            x: pacman.attr('x')-2
                        })
                    }
                    else if(e.keyCode==38){
                        console.log("ARRIBA");
                        pacman.animate('0.1s', {
                            y: pacman.attr('y')-2
                        }, {
                            onEnd: function() {
                                pacman.animate('0.1s', {
                                    y: pacman.attr('y')+2
                                })
                            }
                        });
                    }
                    else {
                        console.log("HHHH");
                        pacman.attr({
                            y: pacman.attr('y')+2
                        })
                    }
                })
            },
            width: 500,
            height: 500
        });
    </script>
</footer>
</html>

