
            function cambia_ora(){
                d = new Date();

                // Estrae le ore, i minuti e i secondi
                h = d.getHours();
                m = d.getMinutes();
                s = d.getSeconds();
                ms = d.getMilliseconds();
                s += ms/1000;
                var canvas = document.getElementById("mioCanvas");
                var context = canvas.getContext("2d");

                //pulisce il canvas
                context.clearRect(0, 0, 400, 400);

                // Disegna il quadrante
                context.fillStyle = "rgba(10, 10, 10, 0.5)";
                context.beginPath();
                    context.arc(200, 200, 150, 0, 2 * Math.PI, false);
                context.closePath();
                context.fill();
                context.lineWidth = 1;
                context.strokeStyle = "rgba(250, 235, 215, 0.7)";
                context.stroke();

                // numeri
                context.fillStyle = "rgba(250, 235, 215, 0.7)";
                context.strokeStyle = "rgba(250, 235, 215, 0.7)";
                context.font = "32pt Arial";
                context.beginPath();
                    context.fillText("XII", 171, 100);
                    context.fillText("III", 300, 220);
                    context.fillText("VI", 180, 340);
                    context.fillText("IX", 60, 220);
                context.closePath();

                context.strokeStyle = "rgba(250, 235, 215, 0.7)";
                // Lancetta dei secondi
                var Sangolo = s * Math.PI / 30;
                var Sx = 200 + 150 * Math.sin(Sangolo);
                var Sy = 200 - 150 * Math.cos(Sangolo);
                context.beginPath();
                    context.moveTo(200, 200);
                    context.lineTo(Sx, Sy);
                context.closePath();
                context.lineWidth = 1;
                context.stroke();

                // Lancetta dei minuti
                var Mangolo = (m * Math.PI / 30) + (Math.PI / 1800 * s);
                var Mx = 200 + 145 * Math.sin(Mangolo);
                var My = 200 - 145 * Math.cos(Mangolo);
                context.beginPath();
                    context.moveTo(200, 200);
                    context.lineTo(Mx, My);
                context.closePath();
                context.lineWidth = 3;
                context.stroke();

                // Lancetta delle ore
                var Hangolo = (h * Math.PI / 6) + (Math.PI / 360 * m) + (Math.PI / 21600 * s);
                var Hx = 200 + 100 * Math.sin(Hangolo);
                var Hy = 200 - 100 * Math.cos(Hangolo);
                context.beginPath();
                    context.moveTo(200, 200);
                    context.lineTo(Hx, Hy);
                context.closePath();
                context.lineWidth = 5;
                context.stroke();


                // L'orologio si aggiorna ogni 1000 millisecondi
                setTimeout("cambia_ora()", 1000);
            }
