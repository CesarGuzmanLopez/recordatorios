<p><b>Descripcion:</b></p>
<p>{{ $Aviso->Descripcion }}</p>
<br>
<p><b>Serie: </b>{{ $Aviso->item->Serie }}</p>
<p><b>Motor: </b>{{ $Aviso->item->Motor }}</p>
<p><b>Placas: </b>{{ $Aviso->item->placas }}</p>
<p><b>Poliza: </b>{{ $Aviso->item->poliza  }}</p>
<div style="margin-left: 15px;"><img src="http://recordatorios.gabrielsan.com/logo.gif?123" alt="" ></div>



<?/*
INSERT INTO `items` (`Serie`,`poliza`, `Descripcion`, `Motor`, `placas`) VALUES
("MR0FA8CD8K3951389","	3881977	   ","     TOYOTA HILUX DOB CAB DIESEL 4X4 MT                          mod: 2019","  1GD0591318	    ",NULL),
("MR0FA8CD9K3901021","	3881977	   ","     TOYOTA HILUX DOBLE CAB. SR STD                              mod: 2019","  1GD0586821	    ","FD5396A  ")    ,
("MR0FA8CD6K3951309","	3881977	   ","     TOYOTA HILUX DOBLE CAB. SR STD                              mod: 2019","  1GD0578780	    ","FD5394A  ")       ,
("MR0FA8CD6K3900974","	3881977	   ","     TOYOTA HILUX DOBLE CAB. SR STD                              mod: 2019","  1GD0577046	    ","FD5393A  ")    ,
("3N6AD33A4KK848230","	3881977	   ","     NISSAN NP300 DOBLE CABINA S AC PAQ. SEG                     mod: 2019","  QR25304009H	    ",NULL      ),
("3N6AD33A5KK845823","	3881977	   ","     NISSAN NP300 DOBLE CABINA S AC PAQ. SEG                     mod: 2019","  QR25301760H	    ","FD8522A  ")    ,
("3N6AD33A8KK845346","	3881977	   ","     NISSAN NP300 DOBLE CABINA S AC PAQ. SEG                     mod: 2019","  QR25301179H	    ",NULL ),
("3N6AD33A8KK845959","	3881977	   ","     NISSAN NP300 DOBLE CABINA S AC PAQ. SEG                     mod: 2019","  QR25301673H	    ","FD8523A  ")                    ,
("3N6AD31A6KK862634","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25319811H	    ",NULL      )                   ,
("3N6AD31A1KK843134","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25295631H	    ",NULL      )                   ,
("3N6AD31A1KK866154","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25321435H	    ",NULL      )                   ,
("3N6AD31A1KK866865","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25321901H	    ",NULL      )                   ,
("3N6AD31A3KK865989","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25320989H	    ",NULL      )                   ,
("3N6AD31A4KK865824","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25322019H	    ",NULL      )                   ,
("3N6AD31A5KK864598","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25319596H	    ",NULL      )                   ,
("3N6AD31A5KK865878","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25320898H	    ",NULL      )                   ,
("3N6AD31A5KK866870","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25322135H	    ","FD8451A  ")                    ,
("3N6AD31A6KK847941","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25303986H	    ",NULL      )               ,
("3N6AD31A7KK864442","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25318835H	    ",NULL      )               ,
("3N6AD31A7KK864456","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25320176H	    ",NULL      )               ,
("3N6AD31A7KK866885","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25321158H	    ","FD8519A  ")                    ,
("3N6AD31A9KK862725","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25319148H	    ",NULL      )               ,
("3N6AD31AXKK866024","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25320180H	    ","FD8525A  ")                    ,
("3N6AD31A1KK862718","	3881977	   ","     NISSAN NP300  PICKUP TM DH AC 6 VEL PAQ. SEG.               mod: 2019","  QR25319761H	    ",NULL      )               ,
("MR0EX8CB7H1397713","	3881977	   ","     TOYOTA HILUX CAB SENCILLA STD                               mod: 2017","  2TRA242713	    ","FC7732A  ")    ,
("MR0EX8CB4H1397541","	3881977	   ","     TOYOTA HILUX CAB SENCILLA STD                               mod: 2017","  2TRA237687	    ","FC7733A  ")    ,
("MR0EX8CB3H1397692","	3881977	   ","     TOYOTA HILUX CAB SENCILLA STD                               mod: 2017","  2TRA242098	    ","FC7734A  ")    ,
("MR0EX8CB2H1397733","	3881977	   ","     TOYOTA HILUX CAB SENCILLA STD                               mod: 2017","  2TRA243491	    ","FC7735A  ")    ,
("MR0EX32G1C0002102","	3881977	   ","     TOYOTA HILUX DOBLE CAB. SR STD PICK UP 158HP 5 OCUP         mod: 2012",NULL,"FH83465  ")                        ,
("MR0EX32G4C0001851","	3881977	   ","     TOYOTA HILUX DOBLE CAB. SR STD PICK UP 158HP 5 OCUP         mod: 2012"," NULL     	    ","FH83464      ")                    ,
("3N6DD23T1CK046017","	3881977	   ","     NISSAN FRONTIER LE ED ESP STD PICK UP 143HP 2.4L 4CIL 5OCUP mod: 2012",NULL,"FH79787  ")                                ,
("JN1BE6DS5K9033473","	3885434	   ","     NISSAN NV350 URVAN 15 PAS AMPLIA AA PA STD                  mod: 2019","  QR25722141Q	    ","FTT955A  ")                ,
("1GKKN8LS2KZ212827","	3885434	   ","     GMC ACADIA PAQ 1SE DENALI AWD                               mod: 2019","  HECHO EN USA	","FTP041A      "),
("WAUSGC4G5GN016587","	3885434	   ","     AUDI SPORTBACK ELITE QUATTRO FX TFSI SEDAN STRONIC          mod: 2016",NULL,"C63ADY   ")                       ,
("MHKMC13E2EK004428","	3885434	   ","     TOYOTA AVANZA HI PREMIUM RA STD                             mod: 2014",NULL,"FWA9663  ")    ,
("3N1AB7AD6EL638467","	3885434	   ","     NISSAN SENTRA SENSE SEDAN CVT AA EE                         mod: 2014",NULL,"FRX375A  ")        ,
("3HGRM4878EG000398","	3885434	   ","     HONDA CRV EXL 4X4 SIS. NAVI. AUT                            mod: 2014",NULL,"FWA8968  ")        ,
("MHKMC13E8DK002889","	3885434	   ","     TOYOTA AVANZA HI PREMIUM RA STD                             mod: 2013",NULL,"FWA8909  ")        ,
("3N1BC1AS8DK219151","	3885434	   ","     NISSAN TIIDA SENSE SEDAN STD                                mod: 2013",NULL,"FWA8913  ")    ,
("JTFSX23P4B6114762","	3885434	   ","     TOYOTA HICE GL VAN STD 149HP 2.7L 4CIL 15OCUP               mod: 2011",NULL,"FWA9957  ")                    ,
("3VWHP6BU8LM003034","	3885434	   ","     VW JETTA CONFORTLINE SEDAN TIPTRONIC AA EE                  mod: 2020","  CZD929846	    ",NULL)       ,
("5XYPH4A37KG486570","	3885434	   ","     KIA SORENTO EX PACK 5P V6 VP ABS BA TPANOR AC AUT           mod: 2019","  G4KJJK152876	",NULL)               ,
("3KPA34AC1JE123505","	3885434	   ","     KIA RIO EX HB L4 IMP STD 4 ABS CA CE TELA SM SQ CB          mod: 2018","  G4FGJE035353	",NULL)               ,
("5XYPH4A56HG321054","	Pol Vigente","     KIA SORENTO EX PACK 5P V6 VP ABS BA TPANOR AC AUT           mod: 2017","  G6DHGA760586	",NULL)               ,
("5XYPH4A59HG310887","	Pol Vigente","     KIA SORENTO EX PACK 5P V6 VP ABS BA TPANOR AC AUT           mod: 2017","  G6DHGS525601	",NULL)               ,
("5XYPH4A5XHG333580","	Pol Vigente","     KIA SORENTO EX PACK 5P V6 VP ABS BA TPANOR AC AUT           mod: 2017","  G6DHHS543922	",NULL);
*/
