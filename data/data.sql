Insert into tbl_users
	(username, passwort, vorname, nachname, email, strasse, wohnort, plz)
values
("aaron", "1234", "Aaron", "Schmid", "aaron.schmied@gmail.com", "strasse 1", "wohnort", "8014"),
("michelle", "1234", "Michelle", "Bacher", "michelle.bacher@hotmail.com", "Zentralstr. 22", "Boswil", "5623"),
("marco", "polo", "Marco", "Schneider", "marco.schneider@gmail.com", "teststdr. 69", "Testwil", "666");

Insert into tbl_abos
	(namen, preis, dauer)
values
("Mausu", "24.95", "1900-02-01 00:00:00"),
("Nousagi", "49.95", "1900-04-01 00:00:00"),
("Shika", "69.95", "1900-07-01 00:00:00");

Insert into tbl_lootboxes
	(  Lootboxname, Lootboxmonat, Artikel)
values
("Late Summer Nights", "August", "frfrf"),
("Free your mind", "September", "tggtgt"),
("Spirits Away - Haloween Special ", "Oktober", "gtgtgt");

Insert into tbl_lootboxesUser
	(sendestatus, fk_lootboxes, fk_userabos)
values
("gesendet", "1", "1"),
("gesendet", "1", "2"),
("sendung ausstehend", "2", "3");

Insert into tbl_userabos
	(zahlungstand, ablaufdatum, fk_users, fk_abos)
values
("bezahlt", "1900-07-01 00:00:00", "1", "3"),
("bezahlt", "1900-02-01 00:00:00", "2", "1"),
("bezahlung ausstehend", "1900-04-01 00:00:00", "3", "2");