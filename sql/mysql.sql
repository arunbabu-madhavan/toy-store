CREATE TABLE HeadCategory ( ID int NOT NULL AUTO_INCREMENT, Name varchar(50) NOT NULL, PRIMARY KEY (ID) );

INSERT INTO HeadCategory (Name) VALUES ('Status');
INSERT INTO HeadCategory (Name) VALUES ('Brands');
INSERT INTO HeadCategory (Name) VALUES ('Product Type');

CREATE TABLE Category ( ID int NOT NULL AUTO_INCREMENT, Name varchar(50) NOT NULL,HeadCategoryID INT NOT NULL, FOREIGN KEY (HeadCategoryID) REFERENCES HeadCategory(ID), PRIMARY KEY (ID) );

TRUNCATE TABLE Category;
INSERT INTO Category (Name,HeadCategoryID) VALUES ('New Arrivals',1);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Trending',1);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Hot Sellers',1);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Anime',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('DC Comics',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Dragon Ball Z',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Game of Thrones',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Godzilla',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('LEGO',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Marvel',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Disney',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Pokemon',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Star Wars',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Transformers',2);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Action Figure',3);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Plush doll',3);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Book',3);
INSERT INTO Category (Name,HeadCategoryID) VALUES ('Accessory',3);

CREATE TABLE product ( ID int NOT NULL AUTO_INCREMENT, Name varchar(255) NOT NULL, Description varchar(1000) NOT NULL,Picture VARCHAR(255) NOT NULL, Price FLOAT NOT NULL, Quantity INT NOT NULL, IsDelete BIT NOT NULL,PRIMARY KEY (ID) );


CREATE TABLE productcategory (
    ProductID int,
    CategoryID int,
    CONSTRAINT FK_Product FOREIGN KEY (ProductID)
    REFERENCES product(ID),
    CONSTRAINT FK_Category FOREIGN KEY (CategoryID)
    REFERENCES Category(ID)
);

DELETE FROM productcategory;
DELETE FROM product;

INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Movie Masterpiece Captain Marvel Diecast Collectible Figure',"The incredibly detailed doll features realistic, rooted hair, and Carol Danvers's classic costume. The figure includes: - Posable arms, legs and head - Painted face - Costume features moulded and fabric details - Made from plastic",'marvel_toy1.jpg',265.99,4,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 1);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 10);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);


INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Game of Thrones Jon Snow 7.5-Inch Statue Figure','Size: 7.5"
Material: Plastic
Style: Non-Articulated Figure
Features interchangeable Dragon Eggs.

The worldwide success of HBOs adaptation of the Game of Thrones has won a legion of fans. This audience is clamoring for related collectibles and merchandise, and Dark Horse Deluxe has been providing it in a steady stream. A core item in the Game of Thrones program is now revealed: an ongoing series of high-quality, affordable, molded plastic figures of the most-asked-for characters.
Show Less...','jonSnow.webp',119.99,9,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 1);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 7);


INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Pokemon Sun & Moon Team Up Torrential Cannon & Relentless Flame Set of Both Theme Decks',"Description coming soon...",'pokemonteamupthemedeckset.jpg',26.99,2,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 1);


INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 2);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 11);




INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Disney Steamboat Willie Action Figure',"The 1928 version of Mickey is joining the Nendoroids! From Steamboat Willie comes a Nendoroid of Mickey Mouse! The version of the Nendoroid features the black & white version of the Mickey shown at the time of the film's release. While maintaining his appearance from that time, he's been brought down to adorable Nendoroid size. Using only black, white and grey, the figure gives off a uniquely warm appearance. He comes included with a smiling standard expression and a whistling expression, allowing you to recreate famous scenes of Mickey at the ship's wheel from the film. The included ship's wheel can be rotated to allow for all kinds of posing options. Mickey also comes with both long and short arm parts as well as standard and bent leg parts, allowing you to recreate a variety of poses. The stand base features a design based on a steamboat deck. Be sure to add him to your collection!",'mickey_toy.webp',63.99,11,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 1);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 18);


INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);



INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Star Wars The Force Awakens Movie Masterpiece R2-D2 Collectible Figure',"R2-D2, youve come back!

In the epic Star Wars: The Force Awakens, fans favorite Astromech droid R2-D2 has played a crucial role in the film when it wakes up from low power mode and presented the last piece of the map leading to the whereabouts of Luke Skywalker.

Sideshow and Hot Toys are pleased to officially introduce the sixth scale collectible figure of this beloved droid based on Star Wars: The Force Awakens! The astonishing collectible figure is specially crafted based on the appearance of R2-D2 in Star Wars: The Force Awakens and features a highly detailed mechanical construction with weathering effects, a meticulously crafted diecast metal dome, touch LED light-up functions, and remote controlled sound effect function featuring 12 iconic R2-D2 sounds! Dont pass up the chance to add this stunning Astromech droid to your Star Wars collection!
",'r2d2.jpg',299.99,1,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 1);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 12);

INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('The Animated Series Batman on Batcycle Action Figure & Vehicle',"An updated version of the classic 90's animated Batman!
",'batman.jpg',53.99,1,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 1);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 18);

INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('LEGO Seasonal Brick Headz Easter Chick Set',"Bring a smile to anyones face this Easter with this LEGO BrickHeadz 40350 Easter Chick. This adorable construction character with iconic BrickHeadz eyes is surrounded by a colorful scene featuring Easter flowers and leaves and hidden eggs!
Buildable LEGO BrickHeadz interpretation of an Easter Chick with BrickHeadz eyes stands in a scene featuring colorful Easter flowers and leaves, and 2 eggs.
Have fun growing your LEGO BrickHeadz collection with a great range of characters from your favorite movies, TV series, games and comics.
Mash up your LEGO BrickHeadz construction characters to create super-cool hybrids or your own amazing characters.
",'brickHeadz.webp',19.99,6,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 2);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 9);

INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Dragon Ball Super: Broly S.H. Figuarts Super Saiyan Blue Goku Action Figure',"The film Dragon Ball Super: Broly was one of the biggest (and fastest!) hits in the series. Now S.H.Figuarts is proud to announce the release of a figure of its star character, Super Saiyan God Super Saiyan Son Goku! It includes an outfit just like the one seen on the film's poster - a first! Don't miss this chance to complete your Dragon Ball collection, at a special new price! The figure includes:
Optional hands(L3, R4), Three types of optional expressions.
",'apigtyca9.jpg',26.99,6,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 2);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 6);


INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Batman 1966 TV Series Villain Variant Series Shame Retro Action Figure',"Retro 8 Inch Action Figures Villain Variant Series. Comes inside of a resealable plastic clamshell.
",'figstoy66classicshameprison.jpg',26.99,6,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 2);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 5);

INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Star Wars Play Arts Kai Variant Stormtrooper Action Figure',"[Set Contents]
-Main figure
-Play Arts kai base
-Heavy blaster rifle
-Blaster rifle
-Muzzle flash parts
-Optional hand parts x4
",'apiirggao.jpg',64.99,3,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 2);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);


INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 12);


INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Transformers Age of Extinction 1 Step Changer Dinobot Slash Action Figure',"Dinobot Slash is back, and he's faster than ever! This Dinobot Slash changer fights his enemies every time he can, and he converts so fast they'll never be able to keep up. Pull him to convert him from mighty robot mode to dino mode in just 1 step, then convert him back again when the battle calls for it! Decepticons will never be able to handle your fast-changing Dinobot Slash figure!
",'apiqmwu98.jpg',44.99,3,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 2);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);
INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 13);


INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Transformers Age of Extinction Generations Lockdown Deluxe Action Figure',"Welcome to the incredible world of Transformers robots. It is a world of high technology, ancient history and a battle that has spanned the entire galaxy and millions of years. Optimus Prime, leader of the heroic Autobots, battles the tyrant Megatron and his evil Decepticons for the fate of freedom across the universe. There's a Transformers figure for every kid or collector. From big converting figures to miniature battling robots, you can team up with Transformers toys to create your own incredible adventures. Whether you're defending Earth with the Autobots, or conquering space with the Decepticons, the action is up to you. Transformers is a world-famous entertainment brand with 30 years of history, blockbuster movies, hit television shows and countless novels and comic books. With Transformers toys, you can create your own chapters in this epic, ongoing story.
",'apiwmj6we.jpg',39.99,33,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 3);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 13);

INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('NECA Godzilla King of the Monsters Godzilla Action Figure',"NECA is thrilled to present another figure from the hotly anticipated 2019 Godzilla: King of the Monsters movie!
Based on the monster's on-screen appearance in this sequel to the 2014 Godzilla movie, this version of Godzilla features lightning paint deco and is fully poseable, with over 25 points of articulation. The figures comes with an attachable blast effect.
",'necagodzillakingofmonstersv2.jpg',24.99,33,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 3);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 8);

INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Black & White Batman 7-Inch Statue',"DC Collectibles' long-running statue line, BATMAN: BLACK AND WHITE, has captured the hearts of collectors and comics
fans alike with its interpretations of the World's Greatest Detective and select Gotham City characters by the industry's brightest stars. Starting in 2019, DC Collectibles is creating an all-new offshoot of the beloved black-and-white collectibles line, this time offering 3.75 tall PVC figures. Released in sets of seven, including resized rereleases of some of the most popular statues in the line's history, each set will come with six previously available mini figures plus one exclusive, never-before-released edition only available in this set.
",'batmanblackwhitejoemadureira.jpg',96.99,33,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 3);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 5);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);

INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Dragon Ball Super Ultimate Soldiers - The Movie Broly 9-Inch Collectible PVC Figure',"The battle continues in Dragon Ball Super the Movie, an epic Dragon Ball movie depicting Gokus epic battle against the legendary Saiyan Broly! The intense determination of Goku, Vegeta, and Broly himself are preserved in Banprestos Dragon Ball Super the Movie Ultimate Soldiers -The Movie- figure series thats as epic as the movie itself.
",'apiqhq7sq__13539.1533764906.jpg',64.99,33,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 3);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 6);


INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Pokemon Eevee 8-Inch Plush',"Take your favorite Pokemon with you wherever you go. These plush figures are 8 inches tall and are hand wash only. Perfect for pre-bedtime battles.
",'wctplsheeve.jpg',24.99,13,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 3);


INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 15);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 11);

INSERT INTO product (Name,Description,Picture,Price,Quantity,IsDelete) VALUES ('Gundam F91 Mobile Suit Variation Vigna-Ghina II RE/100 Model Kit ',"A Mobile Suit Variation (MSV) of Vigna-Ghina from Gundam F91! New parts have been created for the body and includes new head, trigger finger parts, wing nozzles, and weapons like shot lancer.

Runner x 15, sticker, instruction manual.
",'apiaukodw.jpg',44.99,33,0);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 3);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 14);

INSERT INTO productcategory(ProductID,CategoryID) values
(LAST_INSERT_ID() , 13);

CREATE TABLE `User` ( `userId` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(40) NOT NULL ,
`streetAddress` VARCHAR(100) NOT NULL , `city` VARCHAR(40) NOT NULL , `zip` INT NOT NULL , `email` VARCHAR(40) NOT NULL ,
PRIMARY KEY (`userId`)) ENGINE = InnoDB;
ALTER TABLE `User` ADD UNIQUE(`email`);

CREATE TABLE `Sale` ( `saleId` INT NOT NULL AUTO_INCREMENT , `userId` INT NOT NULL , `total` DECIMAL(10,2),
`completed` BOOLEAN NOT NULL , `Date` date DEFAULT NULL, PRIMARY KEY (`saleId`)) ENGINE = InnoDB;

ALTER TABLE `Sale` ADD FOREIGN KEY (`userId`) REFERENCES `User`(`userId`) ON DELETE RESTRICT ON UPDATE CASCADE;

CREATE TABLE `SaleProduct` ( `saleId` INT NOT NULL , `productId` INT NOT NULL, `quantity` INT NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `SaleProduct` ADD  FOREIGN KEY (`saleId`) REFERENCES `Sale`(`saleId`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `SaleProduct` ADD  FOREIGN KEY (`productId`) REFERENCES `product`(`ID`) ON DELETE RESTRICT ON UPDATE CASCADE;

INSERT INTO `User` (`userId`, `username`, `streetAddress`, `city`, `zip`, `email`) VALUES (NULL, 'Sydney St James', '1155 Union Circle #311277', 'Denton', '76203', 'ssJames@unt.edu');
INSERT INTO `User` (`userId`, `username`, `streetAddress`, `city`, `zip`, `email`) VALUES (NULL, 'Matthew White', 'One Microsoft Way', 'Redmon', '98052', 'mwhite@msft.com');
INSERT INTO `User` (`userId`, `username`, `streetAddress`, `city`, `zip`, `email`) VALUES (NULL, 'Jennifer Tran', '3150 Sabre Drive Southlake', 'Southlake', '76092', 'jtran@sabre.com');
INSERT INTO `User` (`userId`, `username`, `streetAddress`, `city`, `zip`, `email`) VALUES (NULL, 'Nick Fealy', '3739 N Steele Blvd, Ste 300', 'Fayetteville', '72703', 'nfealy@supplypike.com');

ALTER TABLE `User` ADD `password` VARCHAR(128) NOT NULL AFTER `email`;

ALTER TABLE `User` ADD UNIQUE(`username`);

CREATE TABLE `role` ( `roleId` INT NOT NULL AUTO_INCREMENT , `description` VARCHAR(100) NOT NULL , PRIMARY KEY (`roleId`)) ENGINE = InnoDB;
CREATE TABLE `roleUser` ( `roleId` INT NOT NULL , `userId` INT NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `roleUser` ADD FOREIGN KEY (`roleId`) REFERENCES `role`(`roleId`) ON DELETE RESTRICT ON UPDATE CASCADE; ALTER TABLE `roleUser` ADD FOREIGN KEY (`userId`) REFERENCES `User`(`userId`) ON DELETE RESTRICT ON UPDATE CASCADE;

UPDATE `User` SET `password` = 'e61d6c9a5685a12bcefdefb0606d6ef5ba51b147068ba38f3d02947536e14924' WHERE `User`.`userId` = 1;
UPDATE `User` SET `password` = '97d7a5cd8938e6a2a968d8d973c6338585acdaa6626f996793bc4c0d9ec9cee3' WHERE `User`.`userId` = 2;
UPDATE `User` SET `password` = '0e7caf4c6cd8b5e95673dacb9448ec244fe73a9a6b6f25ce8c4fb604b0ce139d' WHERE `User`.`userId` = 3;
UPDATE `User` SET `password` = 'bc536583de8a23ff015f0021c018630d971ed868ce0fbeba3737c57a9375557f' WHERE `User`.`userId` = 4;
INSERT INTO `role` (`roleId`, `description`) VALUES ('1', 'admin'), ('2', 'customer');
INSERT INTO `roleUser` (`roleId`, `userId`) VALUES ('1', '1'), ('2', '2'),('2','3'),('2','4');


CREATE TABLE `shippingAddress` ( `saleId` INT NOT NULL , `name` VARCHAR(40) NOT NULL ,
`streetAddress` VARCHAR(100) NOT NULL , `city` VARCHAR(40) NOT NULL , `zip` INT NOT NULL ,
PRIMARY KEY (`saleId`)) ENGINE = InnoDB;

ALTER TABLE `shippingAddress` ADD  FOREIGN KEY (`saleId`) REFERENCES `Sale`(`saleId`) ON DELETE RESTRICT ON UPDATE CASCADE;
