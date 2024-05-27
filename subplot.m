clear;clc;

%membuat subplot 
%subplot (m,n,)
%membagi grid menjadi berukuran m x n dan perintah plot yang
% dipanggil setelahnya akan digambarkan di jendela plot ke-p
figure;

t = 0 : 0.05 : 10;
sinus = sin(2 * pi * 0.25* t);
cosinus = cos(2 * pi * 0.25* t);
kotak = square(2 * pi * 0.25* t);
gigi = sawtooth(2 * pi * 0.25* t);

subplot(2, 2, 1);
plot(t, sinus);
title('Sinus 1/4 Hz');

subplot(2, 2, 2);
plot(t, cosinus );
title('Cosinus 1/4 Hz');

subplot(2, 2, 3);
plot(t, kotak );
title('kotak 1/4 Hz');

subplot(2, 2, 4);
plot(t, gigi );
title('gigi gergaji 1/4 Hz');

% part 2 plot properties
subplot(2,2,1);
plot(t,sinus,'b-o'), title('sinus 1/4 Hz');
subplot(2,2,2);
plot(t,cosinus,'b-o'), title('cosinus 1/4 Hz');
subplot(2,2,3);
plot(t,kotak,'b-o'), title('kotak 1/4 Hz');
subplot(2,2,4);
plot(t,gigi ,'b-o'), title('gigi gergaji 1/4 Hz');
