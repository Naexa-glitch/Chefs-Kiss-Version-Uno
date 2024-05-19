-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para chefskiss
CREATE DATABASE IF NOT EXISTS `chefskiss` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `chefskiss`;

-- Volcando estructura para tabla chefskiss.tb_image
CREATE TABLE IF NOT EXISTS `tb_image` (
  `id_image` int(10) NOT NULL AUTO_INCREMENT,
  `recipe_img` text NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla chefskiss.tb_image: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_image` ENABLE KEYS */;

-- Volcando estructura para tabla chefskiss.tb_likes_recipe
CREATE TABLE IF NOT EXISTS `tb_likes_recipe` (
  `id_likes_recipe` int(10) NOT NULL AUTO_INCREMENT,
  `id_recipe` int(10) NOT NULL DEFAULT '0',
  `recipe_likes` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_likes_recipe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla chefskiss.tb_likes_recipe: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_likes_recipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_likes_recipe` ENABLE KEYS */;

-- Volcando estructura para tabla chefskiss.tb_prep_time
CREATE TABLE IF NOT EXISTS `tb_prep_time` (
  `id_prep_time` int(10) NOT NULL AUTO_INCREMENT,
  `prep_time` text NOT NULL,
  PRIMARY KEY (`id_prep_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla chefskiss.tb_prep_time: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_prep_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_prep_time` ENABLE KEYS */;

-- Volcando estructura para tabla chefskiss.tb_recipes
CREATE TABLE IF NOT EXISTS `tb_recipes` (
  `id_recipe` int(10) NOT NULL AUTO_INCREMENT,
  `recipe_name` text NOT NULL,
  `recipe_img` text NOT NULL,
  `recipe_prep_time` text NOT NULL,
  `recipe_instructions` text NOT NULL,
  `recipe_cook_time` text NOT NULL,
  `recipe_total_time` text NOT NULL,
  `recipe_yields` text NOT NULL,
  `id_recipe_category` int(10) NOT NULL DEFAULT '0',
  `id_recipe_complex` int(10) NOT NULL DEFAULT '0',
  `id_recipe_date` int(10) NOT NULL DEFAULT '0',
  `recipe_description` text NOT NULL,
  `recipe_likes` int(10) NOT NULL DEFAULT '0',
  `recipe_ingredients` text NOT NULL,
  `recipe_category` text,
  `recipe_complex` text,
  `recipe_date` text,
  PRIMARY KEY (`id_recipe`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla chefskiss.tb_recipes: ~28 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_recipes` DISABLE KEYS */;
INSERT INTO `tb_recipes` (`id_recipe`, `recipe_name`, `recipe_img`, `recipe_prep_time`, `recipe_instructions`, `recipe_cook_time`, `recipe_total_time`, `recipe_yields`, `id_recipe_category`, `id_recipe_complex`, `id_recipe_date`, `recipe_description`, `recipe_likes`, `recipe_ingredients`, `recipe_category`, `recipe_complex`, `recipe_date`) VALUES
	(13, 'Tasty Onion Chicken', 'recipe-upload-SOzJYIKX5k.png', '5-10 min', 'In a shallow bowl combine butter Worcestershire sauce and mustard., Place onions in another shallow bowl., Dip chicken in butter mixture then coat with onions., Place in a greased 11x7-in. baking dish;, drizzle with remaining butter mixture., Bake uncovered at 400Â° for 20-25 minutes or until a thermometer reads 165Â°. ', '20-25 min', '30 min', '4 servings', 132, 1, 11, 'The secret to this French onion chicken is the yummy, crunchy coating that keeps the meat juicy and tender. Round out your meal with green beans and buttermilk biscuits. â€”Jennifer Hoeft, Thorndale, Texas', 2, '1/2 cup butter, melted, 1 tablespoon Worcestershire sauce, 1 teaspoon ground mustard, 1 can (2.8 ounces) French-fried onions, crushed, 4 boneless skinless chicken breast halves (4 ounces each)', NULL, NULL, NULL),
	(14, 'One-Pot Mac and Cheese', 'recipe-upload-TN1RKjI3Da.jpg', '5 min', 'In a Dutch oven combine milk water and macaroni; bring to a boil over medium heat., Reduce heat and simmer until macaroni is tender and almost all the cooking liquid has been absorbed 12-15 minutes stirring frequently., Reduce heat to low; stir in cheeses until melted. Season with salt and pepper.', '30 min', '35 min', '10 servings', 231, 1, 15, 'Who likes cleaning up after making mac and cheese? Not this girl. This one-pot mac and cheese is a family favorite, and my 3-year-old is thrilled to see it coming to the dinner table. We love to add sliced smoked sausage to this creamy mac recipe! â€”Ashley Lecker, Green Bay, Wisconsin', 0, '3-1/2 cups whole milk, 3 cups water, 1 package (16 ounces) elbow macaroni, 4 ounces Velveeta, cubed, 2 cups shredded sharp cheddar cheese, 1/2 teaspoon salt, 1/2 teaspoon coarsely ground pepper', NULL, NULL, NULL),
	(15, 'Shrimp Pasta Alfredo', 'recipe-upload-4ppd3mvWan.jpg', '5 min', 'In a Dutch oven cook pasta according to package directions adding peas during the last 3 minutes of cooking; drain and return to pan., Stir in shrimp and sauce; heat through over medium heat, stirring occasionally. Sprinkle with cheese.', '25 min', '30 min', '4 servings', 231, 1, 14, 'My son loves any recipe with Alfredo sauce. As a bachelor, shrimp pasta was one of the first recipes he learned to prepare. Now his children ask for it regularly. Gail Lucas, Olive Branch, Mississippi', 0, '3 cups uncooked bow tie pasta, 2 cups frozen peas, 1 pound peeled and deveined cooked medium shrimp, tails removed, 1 jar (15 ounces) Alfredo sauce, 1/4 cup shredded Parmesan cheese', NULL, NULL, NULL),
	(16, 'Marinated Grilled Flank Steak', 'recipe-upload-ndhHzAIEHS.jpg', '5  min', 'In a small bowl whisk barbecue sauce wine and lemon juice until blended. Pour 1 cup marinade into a shallow dish. Add beef and turn to coat. Cover; refrigerate 4 hours or overnight. Cover and refrigerate remaining marinade., Drain beef discarding marinade in dish. Grill steak covered over medium heat until meat reaches desired doneness (for medium-rare a thermometer should read 135Â°; medium, 140Â°; medium-well 145Â°) 6-8 minutes on each side. Let stand 5 minutes before thinly slicing across the grain. Serve with reserved marinade.', '15 min', '20 min', '8 servings', 132, 1, 16, 'Friends shared this three-ingredient marinade years ago, and itâ€™s been a favorite since. Serve the steak with salad and grilled potatoes for a quick meal. â€”Beverly Dietz, Surprise, Arizona', 0, '1 cup barbecue sauce, 1/2 cup burgundy wine or beef broth, 1/4 cup lemon juice, 1 beef flank steak (2 pounds)', NULL, NULL, NULL),
	(17, 'Chicken with Rosemary Butter Sauce', 'recipe-upload-UrLtxxrFT5.jpg', '5 min', 'In a large skillet over medium heat cook chicken in 1 tablespoon butter until a thermometer reads 165Â° 4-5 minutes on each side. Remove and keep warm., Add wine to pan; cook over medium-low heat stirring to loosen browned bits from pan. Add cream and bring to a boil. Reduce heat; cook and stir until slightly thickened. Stir in rosemary and remaining 3 tablespoons butter until blended. Serve sauce with chicken.', '25 min', '30 min', '4 servings', 132, 1, 14, 'This elegant rosemary chicken requires minimal effort but will win you major compliments. You\'ll love the mellow sauce! â€”Connie McDowell, Greenwood, Delaware', 0, '4 boneless skinless chicken breast halves (6 ounces each), 4 tablespoons butter divided, 1/2 cup white wine or chicken broth, 1/2 cup heavy whipping cream, 1 tablespoon minced fresh rosemary', NULL, NULL, NULL),
	(18, 'Breaded Pork Chops', 'recipe-upload-A19TJIRX2h.jpg', '10 min', 'In a shallow bowl combine egg and milk. Place cracker crumbs in another shallow bowl. Dip each pork chop in egg mixture then coat with cracker crumbs patting to make a thick coating., In a large skillet cook chops in oil for 4-5 minutes on each side or until a thermometer reads 145Â°. Let meat stand for 5 minutes before serving.', '10 min', '20 min', '6 servings', 231, 1, 11, 'These traditional pork chops have a wonderful home-cooked flavor like the ones Mom used to make. The breading makes them crispy outside and tender and juicy inside. Why not treat your family to some breaded pork chops tonight? â€”Deborah Amrine, Grand Haven, Michigan', 0, '1 large egg, lightly beaten, 1/2 cup 2% milk, 1-1/2 cups crushed saltine crackers, 6 boneless pork loin chops (1 inch thick), 1/4 cup canola oil', NULL, NULL, NULL),
	(19, 'Fast Baked Fish', 'recipe-upload-rWV1v7h2zN.jpg', '5 min', 'Preheat oven to 400Â°. Place fish in a greased 11x7-in. baking dish. Sprinkle with seasoned salt pepper and if desired paprika. Drizzle with butter., Cover and bake until fish just begins to flake easily with a fork 15-20 minutes.', '15-20 min', '20-25 min', '4 servings', 132, 1, 17, 'We always have a good supply of fresh fish, so I make fish recipes often. This recipe is my favorite because it is moist, tender and flavorful. â€”Judie Anglen, Riverton, Wyoming', 0, '1-1/4 pounds fish fillets, 1 teaspoon seasoned salt, Pepper to taste, Paprika, optional, 3 tablespoons butter, melted', NULL, NULL, NULL),
	(20, 'Buffalo Chicken Sliders', 'recipe-upload-uI6sErX7So.jpg', '20 min', 'Place chicken in a 3-qt. slow cooker. Toss with 2 tablespoons hot sauce and pepper; cook covered on low 3-4 hours or until tender., Remove chicken; discard cooking juices. In a small saucepan combine butter honey and remaining hot sauce; cook and stir over medium heat until blended. Shred chicken with 2 forks; stir into sauce and heat through. Serve on rolls with desired optional ingredients.', '3 hours', '3 hours and 20 min', '6 servings', 342, 1, 15, 'I got the idea for these Buffalo chicken sliders from my mom and dad, who\'d made a similar version for a family get-together. It\'s a versatile recipe, and I sometimes use several different styles of Buffalo sauce and let guests mix and match their favorites. â€”Christina Addison, Blanchester, Ohio', 0, '1 pound boneless skinless chicken breasts, 2 tablespoons plus 1/3 cup Louisiana-style hot sauce divided, 1/4 teaspoon pepper, 1/4 cup butter cubed, 1/4 cup honey, 12 Hawaiian sweet rolls warmed, Optional: Lettuce leaves, sliced tomato thinly sliced red onion and crumbled blue cheese', NULL, NULL, NULL),
	(21, 'Taco Pizza Squares', 'recipe-upload-sSVaDXkpDw.jpg', '5 min', 'Unroll pizza dough and place in a 15x10x1-in. baking pan. Spread with pizza sauce; sprinkle with the taco meat, tomatoes and cheese. Bake at 400Â° until crust is golden brown, 15-20 minutes. Top with shredded lettuce and sour cream if desired.', '15-20 min', '20-25 min', '10 servings', 132, 1, 11, 'Everyone will come running the minute you take this fun twist on pizza out of the oven. I top convenient refrigerated pizza dough with leftover taco meat, tomatoes and cheese, bringing a full-flavored fiesta to the table in under half an hour. â€”Sarah Vovos, Middleton, Wisconsin.', 0, '1 tube (13.8 ounces) refrigerated pizza crust, 1 can (8 ounces) pizza sauce, 2 cups seasoned taco meat, 2 medium tomatoes seeded and chopped, 2 cups shredded mozzarella cheese, Optional: Shredded lettuce and sour cream', NULL, NULL, NULL),
	(22, 'Fruited Pot Roast', 'recipe-upload-3JxDt495JG.jpg', '15 min', 'Place fruit and onion in a 3- or 4-qt. slow cooker; add apple juice. Top with roast; sprinkle with seasonings., Cover and cook on low until meat is tender, 6-8 hours. Serve beef with fruit mixture.', '6 hours', '6 hours and 15 min', '6 servings', 132, 1, 13, 'This is a wonderful variation of classic pot roast. My family really enjoys it. The fruit is a nice change from the usual vegetables that normally accompany this dish.â€”Linda South, Pineville, North Carolina', 0, '1 package (7 ounces) mixed dried fruit, 1 large onion, cut into wedges, 1 can (5-1/2 ounces) unsweetened apple juice, 1 boneless beef chuck roast (2 pounds),  1/2 teaspoon salt,  1/4 teaspoon ground allspice,  1/4 teaspoon pepper', NULL, NULL, NULL),
	(23, 'Crispy Dill Tilapia', 'recipe-upload-8CTRPPwGBO.jpg', '2 min', 'Preheat oven to 400Â°. Toss together first 5 ingredients., Place tilapia in a 15x10x1-in. baking pan coated with cooking spray; brush with lemon juice. Top with crumb mixture, patting to help adhere., Bake, uncovered, on an upper oven rack until fish just begins to flake easily with a fork, 12-15 minutes. Serve with lemon wedges.', '20 min', '22 min', '4 servings', 231, 1, 17, 'Every week I try to serve a new healthy fish. With its fresh dill and delicious panko bread crumb herb crust, this dish with mild tilapia is a winner. â€”Tamara Huron, New Market, Alabama', 0, '1 cup panko bread crumbs, 2 tablespoons olive oil, 2 tablespoons snipped fresh dill, 1/4 teaspoon salt, 1/8 teaspoon pepper, 4 tilapia fillets (6 ounces each), 1 tablespoon lemon juice, Lemon wedges', NULL, NULL, NULL),
	(24, 'Nutty Cheese Tortellini', 'recipe-upload-qtdR5Sp2t4.jpg', '5 min', 'Cook tortellini according to package directions; drain and keep warm. In the same pan melt butter. Stir in the tortellini parsley and walnuts; toss to coat. Sprinkle with cheese and pepper.', '15 min', '20 min', '3 servings', 231, 1, 17, 'I like to plant Italian flat-leaf parsley in a long terra-cotta planter so I always have some on hand. It adds bright, fresh flavor to this pasta dish. â€”Barbara Penatzer, Vestal, New York', 0, '1 package (9 ounces) refrigerated cheese tortellini, 1/2 cup butter, cubed, 1/2 cup minced fresh parsley, 1/3 cup chopped walnuts, toasted, 1/4 cup shredded Parmesan cheese, Coarsely ground pepper to taste', NULL, NULL, NULL),
	(25, 'Orange Pomegranate Salmon', 'recipe-upload-P28VxJUj23.jpg', '10 min', 'Preheat oven to 375Â°. Place a 28x18-in. piece of heavy-duty foil in a 15x10x1-in. baking pan. Place onion slices in a single layer on foil. Top with salmon; sprinkle with salt. Arrange orange slices over top. Sprinkle with pomegranate seeds; drizzle with oil. Top with a second piece of foil. Bring edges of foil together on all sides and crimp to seal forming a large packet., Bake until fish just begins to flake easily with a fork, 25-30 minutes. Be careful of escaping steam when opening packet. Remove to a serving platter; sprinkle with dill.', '25 min', '35 min', '4 servings', 132, 1, 18, 'A colorful, festive salmon dish makes an impressive addition to your holiday tableâ€”and it is as delicious as it is beautiful. What will no one guess? How easy it is to cook. I serve this with roasted baby potatoes and asparagus for a showstopping meal that is wonderful for special occasions. â€”Thomas Faglon, Somerset, New Jersey', 0, '1 small red onion, thinly sliced, 1 skinned salmon fillet (about 2 pounds), 1/2 teaspoon salt, 1 medium navel orange, thinly sliced, 1 cup pomegranate seeds, 2 tablespoons extra virgin olive oil, 1 tablespoon minced fresh dill', NULL, NULL, NULL),
	(26, 'Artichoke Chicken Pesto Pizza', 'recipe-upload-qKubbfY7QY.jpg', '15 min', 'Preheat oven to 425Â°. Place crust on an ungreased 12-in. pizza pan. Spread with pesto. Arrange chicken and artichokes over top; sprinkle with cheese. Bake until golden brown, 10-12 minutes. If desired, top with Parmesan cheese and minced fresh basil.', '10-12 min', '25-27 min', '8 servings', 132, 1, 11, 'Make pizza night an upscale affair with this fun twist on the traditional pie. A prebaked crust and prepared pesto keep things quick and easy. â€”Trisha Kruse, Eagle, Idaho', 0, '1. 1 prebaked, 12-inch pizza crust, 1/2 cup prepared pesto, 2 cups cubed cooked chicken breast, 2 jars (6-1/2 ounces each) marinated artichoke hearts drained, 2 cups shredded part-skim mozzarella cheese, Optional: Grated Parmesan cheese and minced fresh basil', NULL, NULL, NULL),
	(27, 'Peppered Pork with Mushroom Sauce', 'recipe-upload-RMYHkrx0iS.jpg', '8 min', 'In a large skillet heat 1 tablespoon oil over medium heat. Brown pork on both sides. Remove from pan., In same pan, heat remaining oil over medium-high heat. Add mushrooms and onion; cook and stir until tender, 4-5 minutes, In a small bowl, mix flour and broth until smooth. Stir into mushroom mixture. Bring to a boil; cook and stir until sauce is thickened. Return pork to pan. Cook until a thermometer inserted in pork reads 145Â°.', '30 min', '38 min', '4 servings', 231, 1, 11, 'Using pre-seasoned pork tenderloin gives us flavorful, quick and satisfying meals without a big mess or leftovers. I have used all flavors of pork tenderloin for this recipe. Making the sauce doesn\'t take much extra time and results are well worth it. â€”Jolene Roszel, Helena, Montana', 0, '2 tablespoons olive oil, divided, 1 peppercorn pork tenderloin (1 pound) or flavor of your choice, cut into 3/4-inch slices, 1/2 cup sliced fresh mushrooms, 1/4 cup chopped onion, 2 tablespoons all-purpose flour, 1 cup reduced-sodium beef broth', NULL, NULL, NULL),
	(28, 'Sausage and Sauerkraut', 'recipe-upload-wOvC1i9iKv.jpg', '10 min', '2. In a large skillet saute the potatoes in oil until lightly browned 5-6 minutes. Stir in onion; saute until tender 3-4 minutes. Add the sausage sauerkraut and pepper. Cook uncovered over medium heat until heated through 4-5 minutes stirring occasionally.', '20 min', '30 min', '4 servings', 132, 1, 15, 'I created this tasty, quick and easy sauerkraut and sausage dish so I can throw it together in no time on those extra-busy nights. â€” Mary Lyon, Spotsylvania, Virginia', 3, '6 medium red potatoes, cubed, 2 tablespoons canola oil, 1 small onion halved and sliced, 1 pound smoked sausage,cut into 1/4-inch pieces, 1 package (16 ounces) sauerkraut, rinsed and well drained, 1/4 teaspoon pepper', NULL, NULL, NULL),
	(29, 'Sausage Hash', 'recipe-upload-eQofUaJAi2.jpg', '10 min', 'In a large cast-iron or other heavy skillet, cook the sausage over medium heat until no longer pink; drain. Add the onion, carrots and green pepper; cook until tender. Stir in the potatoes, salt and pepper. Reduce heat; cook and stir until lightly browned and heated through, about 20 minutes.', '30 min', '40 min', '6 servings', 231, 1, 12, 'We always have plenty of pork sausage around, so when I need a quick supper, I use this handy recipe. The colorful vegetables give the hash a bold look to match its flavor. â€”Virginia Krites, Cridersville, Ohio', 0, '1 pound bulk pork sausage, 1 medium onion, chopped, 2 medium carrots grated, 1 medium green pepper chopped, 3 cups diced cooked potatoes, 1/2 teaspoon salt, 1/4 teaspoon pepper', NULL, NULL, NULL),
	(31, 'Black Bean and Beef Tostadas', 'recipe-upload-wCyVsvysIv.jpg', '16 min', 'In a large skillet cook beef over medium-high heat until no longer pink 4-6 minutes; crumble beef. Stir in tomatoes; bring to a boil. Reduce heat; simmer uncovered until liquid is almost evaporated 6-8 minutes. Stir in black beans; heat through.     2. To serve spread refried beans over tostada shells. Top with beef mixture; add toppings as desired.', '14 min', '30 min', '4 servings', 342, 1, 11, 'You only need a handful of ingredients to make one of our familyâ€™s favorites. It\'s also easy to double for company! â€”Susan Brown, Kansas City, Kansas', 0, '1/2 pound lean ground beef (90% lean), 1 can (10 ounces) diced tomatoes and green chiles, undrained, 1 can (15 ounces) black beans, rinsed and drained, 1 can (16 ounces) refried beans, warmed, 8 tostada shells, Optional: Shredded reduced-fat Mexican cheese blend shredded lettuce salsa and sour cream', NULL, NULL, NULL),
	(32, 'Herbed Pork Chops', 'recipe-upload-Ue9k2Jj0gw.jpg', '5 min', 'Sprinkle pork chops with lemon juice. In a small bowl combine the parsley rosemary thyme and pepper; rub over chops., Grill, covered over medium heat for 4-5 minutes on each side or until a thermometer reads 145Â°. Let meat stand for 5 minutes before serving.', '20 min', '25 min', '4 servings', 132, 1, 18, 'Herbs are a fast and flavorful way to dress up pork. Plus, they make the chops look so pretty on a platter. I prepare these year-round as a way to capture the taste of summer. â€”Dianne Esposite, New Middletown, Ohio', 0, '4 boneless pork loin chops (4 ounces each), 2 teaspoons lemon juice, 2 tablespoons chopped fresh parsley, 1/2 teaspoon dried rosemary crushed, 1/2 teaspoon dried thyme crushed     6. 1/4 teaspoon pepper', NULL, NULL, NULL),
	(33, 'Ravioli Lasagna', 'recipe-upload-dUbWHPUqd7.jpg', '25 min', 'In a large skillet cook and crumble beef over medium heat until no longer pink, 5-7 minutes; drain. In a greased 2-1/2-qt. baking dish, layer a third of the spaghetti sauce, half of the ravioli and beef, and 1/2 cup cheese; repeat layers. Top with remaining sauce and cheese.     2. Cover and bake at 400Â° until heated through, 40-45 minutes. If desired, top with basil to serve.', '40 min', '1 hour and 5 min', '8 servings', 231, 1, 11, 'When you taste this casserole, you\'ll think it came from a complicated, from-scratch recipe. Really, though, it starts with frozen ravioli and has only three other ingredients. â€”Patricia Smith, Asheboro, North Carolina', 0, '1 pound ground beef, 1 jar (28 ounces) spaghetti sauce, 1 package (25 ounces) frozen sausage or cheese ravioli, 1-1/2 cups shredded part-skim mozzarella cheese, Minced fresh basil, optional', NULL, NULL, NULL),
	(34, 'Grilled Maple Pork Chops', 'recipe-upload-uHUeVBHLfj.jpg', '5 min', 'In a small bowl whisk syrup vinegar salt and pepper until blended. Pour 1/2 cup marinade into a shallow bowl. Add pork chops; turn to coat. Cover and refrigerate 1 hour. Reserve remaining marinade for basting.     2. Drain pork chops, discarding marinade. On an oiled grill, cook pork chops, covered, over medium heat or broil 4 in. from heat until a thermometer reads 145Â°, 13-17 minutes, turning occasionally and basting with reserved marinade during the last 5 minutes. Let stand 5 minutes before serving.', '15 min', '20 min', '4 servings', 132, 1, 18, 'Pork chops on the grill are hard to beat. The marinade is simple, and so good. â€”Nicholas King, Duluth, Minnesota', 0, '6 tablespoons maple syrup, 6 tablespoons balsamic vinegar, 3/4 teaspoon salt, 3/4 teaspoon coarsely ground pepper, 4 boneless pork loin chops (1-1/2 inch thick and 12 ounces each)', NULL, NULL, NULL),
	(35, 'Tangy Beef Turnovers', 'recipe-upload-oddONhDcM7.jpg', '5 min', 'Preheat oven to 375Â°. In a large skillet cook beef and onion over medium heat until meat is no longer pink 5-7 minutes; crumble meat; drain. Add sauerkraut and cheese., Unroll crescent roll dough and separate into rectangles. Place on greased baking sheets; pinch seams to seal. Place 1/2 cup beef mixture in the center of each rectangle. Bring corners to the center and pinch to seal. Bake for 15-18 minutes or until golden brown.', '25 min', '30 min', '1 dozen', 342, 1, 11, 'My mom\'s recipe for these flavorful pockets called for dough to be made from scratch, but I streamlined it by using crescent rolls. My children love them plain or dipped in ketchup â€” mustard works, too. â€”Claudia Bodeker, Ash Flat, Arkansas', 0, '1 pound ground beef, 1 medium onion, chopped, 1 jar (16 ounces) sauerkraut, rinsed, drained and chopped, 1 cup shredded Swiss cheese, 3 tubes (8 ounces each) refrigerated crescent rolls', NULL, NULL, NULL),
	(36, 'Pumpkin Pie Hot Chocolate', 'recipe-upload-20bmKznWPP.jpg', '10 min', 'In a 4-qt. slow cooker, combine all ingredients. Cook, covered, on low, 2 hours, stirring occasionally, until mixture is hot and chocolate is melted., If desired, garnish with marshmallows or whipped cream.', '2 hours', '2 hours and 10 min', '10 servings', 431, 1, 16, 'Pumpkin pie vodka hot chocolate is the ultimate holiday cocktail. Made in a slow cooker and perfect for feeding a crowd, this creamy twist on a classic is a must-make for the holidays! â€”Becky Hardin, St. Peters, Missouri', 1, '4 cups whole milk, 2 cups heavy whipping cream, 1 can (14 ounces) sweetened condensed milk, 1 package (12 ounces) semisweet chocolate chips 1, cup vodka,  1 cup canned pumpkin, 1 tablespoon pumpkin pie spice, Optional: Miniature marshmallows or whipped cream', NULL, NULL, NULL),
	(37, 'Thai Meatball Soup', 'recipe-upload-uTs8JLeFzC.jpg', '20 min', 'In a large bowl, combine cilantro, coconut 4-1/2 teaspoons teriyaki sauce salt and ginger. Add chicken; mix lightly but thoroughly. Shape into 1-1/2-in. balls. In a Dutch oven, brown meatballs in batches in sesame oil over medium-high heat; remove and keep warm. Drain any excess oil from pan. Add broth to pan; cook 1 minute, stirring to loosen browned bits from pan., Return all meatballs to pan. Add coconut milk carrots and remaining 4-1/2 teaspoons teriyaki sauce; bring to a boil. Reduce heat; simmer, covered, until meatballs are cooked through, 5-7 minutes. Stir in kale, lime juice and brown sugar. Cook until kale just begins to wilt, about 5 minutes longer. Serve with additional chopped cilantro and lime wedges, if desired.', '30 min', '50 min', '7 cups', 243, 1, 11, 'This son-approved, Thai-inspired soupâ€”with meatballs, kale, carrots and creamy coconut milkâ€”is warm deliciousness on a chilly day. â€”Arlene Erlbach, Morton Grove, Illinois', 0, '1/2 cup fresh cilantro, finely chopped, 1/3 cup unsweetened shredded coconut, 3 tablespoons teriyaki sauce, divided, 1/2 teaspoon salt , 1/2 teaspoon ground ginger, 1-1/2 pounds ground chicken     8. 1/4 cup sesame oil     9. 3 cups chicken broth      10. 1 can (13.66 ounces) coconut milk     11. 1-1/2 cups julienned carrots     12. 2 cups torn fresh kale     13. 4-1/2 teaspoons lime juice     14. 1 tablespoon brown sugar     15. Lime wedges, optional', NULL, NULL, NULL),
	(38, 'Coffee Cheesecake', 'recipe-upload-w4OoTAAWMC.jpg', '30 min', 'Preheat oven to 325Â°. Place a greased 9-in. springform pan on a double thickness of heavy-duty foil (about 18 in. square). Securely wrap foil around pan., In a small bowl, mix cookie crumbs and butter; press onto the bottom of prepared pan.,  In another bowl, mix the coffee granules and hot water. In a large bowl, beat cream cheese, sugar, flour and vanilla until smooth. Add eggs and coffee mixture; beat on low speed just until combined. Pour over crust. Place springform pan in a large baking pan; add 1 in. of hot water to larger pan., Bake at 325Â° for 60-70 minutes or until center is just set and top appears dull. Remove springform pan from water bath; remove foil. Cool cheesecake on a wire rack for 10 minutes; loosen sides from pan with a knife. Cool 1 hour longer. Refrigerate overnight, For ganache, place chocolate chips in a small bowl. In a small saucepan, bring cream just to a boil. Pour over chocolate; whisk until smooth. Stir in vanilla. Cool slightly to reach a spreading consistency stirring occasionally.     6. Remove rim from pan. Spread ganache over cheesecake. Refrigerate 1 hour or until set. If desired decorate with whipped cream and espresso beans.', '1 hour and 10 min', '1 hour and 40 min', '16 serings', 324, 1, 12, 'Coffee lovers will line up for this rich coffee cheesecake. It\'s creamy and just mildly sweet, which allows the coffee flavor to shine through. â€”Taste of Home Test Kitchen', 0, '20 Oreo cookies finely crushed (about 1-2/3 cups), 1/4 cup butter, melted,  3 tablespoons instant coffee granules     4. 2 tablespoons hot water     5. 4 packages (8 ounces each) cream cheese, softened     6. 1-1/3 cups sugar     7. 2 tablespoons all-purpose flour    8. 2 teaspoons vanilla extract     9.  4 large eggs, room temperature, lightly beaten     10. 1 cup semisweet chocolate chips     11. 2/3 cup heavy whipping cream     12. 1-1/2 teaspoons vanilla extract     13. Optional: Whipped cream and coarsely chopped espresso beans', NULL, NULL, NULL),
	(39, 'Blueberry Dump Cake', 'recipe-upload-gKm0G8KBgG.jpg', '10 min', 'Preheat oven to 350Â°. Mix pie filling and almond extract; spread into a greased 11x7-in. baking dish. Stir together blueberries and brown sugar; place over pie filling. Sprinkle with cake mix; drizzle with butter.     2. Bake until golden brown, 30-35 minutes. Cool on a wire rack. If desired, serve with whipped cream and additional blueberries.', '35 min', '45 min', '12 servings', 324, 1, 13, 'When I need a quick dessert, this is the recipe I reach for most of the time. I usually have the ingredients on hand so I can whip it together in just a few minutes. â€”Rashanda Cobbins, Taste of Home Food Editor', 0, '1 can (21 ounces) blueberry pie filling, 1/2 teaspoon almond extract, 2 cups fresh or frozen blueberries, 1/3 cup packed brown sugar, 1 package (16-1/2 ounces) yellow cake mix,  3/4 cup butter, melted,  Whipped cream, optional', NULL, NULL, NULL),
	(40, 'Lemon Thyme Green Tea', 'recipe-upload-dbN93I35kl.jpg', '6 min', 'In a large saucepan, bring water to a boil; remove from heat. Add tea bags and lemon thyme sprigs; steep, covered, 3 minutes. Discard tea bags; steep, covered, 3 minutes longer. Strain tea. Add honey and lemon juice; stir until honey is dissolved. Stir in sugar if desired. Serve immediately.', '14 min', '20 min', '8 servings', 431, 1, 18, 'Fresh sprigs of lemon thyme make this citrusy tea so refreshingâ€”itâ€™s like sipping summer from a cup. My family and I enjoy it so much that itâ€™s a staple on our southern front porch.â€”Melissa Pelkey Hass, Waleska, Georgia', 0, '2 quarts water, green tea bags, fresh lemon thyme sprigs or 8 fresh thyme sprigs plus 1/2 teaspoon grated lemon zest, 1/4 cup honey, 3 tablespoons lemon juice, Sugar, optional', NULL, NULL, NULL),
	(47, 'True Belgian Waffles', 'recipe-upload-1d1yGulkWB.jpg', '20 min', 'In a bowl, combine flour sugar and baking powder. In another bowl lightly beat egg yolks. Add milk butter and vanilla; mix well. Stir into dry ingredient just until combined. Beat egg whites until stiff peaks form; fold into batter., Bake in a preheated waffle maker according to manufacturer\'s directions until golden brown. Serve with strawberries or syrup.', '10 min', '30 min', '10 servings', 321, 1, 11, 'It was during a visit to my husband\'s relatives in Europe that I was given this Belgian waffle recipe. These homemade waffles are fantastic with any kind of topping: blueberries, strawberries, raspberries, fried apples, powdered sugar or whipped topping. â€”Rose Delemeester, St. Charles, Michigan', 0, '2 cups all-purpose flour, 3/4 cup sugar, 3-1/2 teaspoons baking powder, 2 large eggs, separated, room temperature, 1-1/2 cups whole milk,, 1 cup butter, melted 1 teaspoon vanilla extract Sliced fresh strawberries or syrup', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tb_recipes` ENABLE KEYS */;

-- Volcando estructura para tabla chefskiss.tb_recipe_category
CREATE TABLE IF NOT EXISTS `tb_recipe_category` (
  `id_recipe_category` int(10) NOT NULL AUTO_INCREMENT,
  `recipe_category` text NOT NULL,
  PRIMARY KEY (`id_recipe_category`)
) ENGINE=InnoDB AUTO_INCREMENT=432 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla chefskiss.tb_recipe_category: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_recipe_category` DISABLE KEYS */;
INSERT INTO `tb_recipe_category` (`id_recipe_category`, `recipe_category`) VALUES
	(132, 'Dinner'),
	(231, 'Lunch'),
	(243, 'Soup'),
	(321, 'Breakfast'),
	(324, 'Dessert'),
	(342, 'Appetizer'),
	(431, 'Beverages');
/*!40000 ALTER TABLE `tb_recipe_category` ENABLE KEYS */;

-- Volcando estructura para tabla chefskiss.tb_recipe_complex
CREATE TABLE IF NOT EXISTS `tb_recipe_complex` (
  `id_recipe_complex` int(10) NOT NULL AUTO_INCREMENT,
  `recipe_complex` text NOT NULL,
  PRIMARY KEY (`id_recipe_complex`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla chefskiss.tb_recipe_complex: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_recipe_complex` DISABLE KEYS */;
INSERT INTO `tb_recipe_complex` (`id_recipe_complex`, `recipe_complex`) VALUES
	(1, 'Easy'),
	(2, 'Intermediate'),
	(3, 'Advanced');
/*!40000 ALTER TABLE `tb_recipe_complex` ENABLE KEYS */;

-- Volcando estructura para tabla chefskiss.tb_recipe_date
CREATE TABLE IF NOT EXISTS `tb_recipe_date` (
  `id_recipe_date` int(10) NOT NULL AUTO_INCREMENT,
  `recipe_date` text NOT NULL,
  PRIMARY KEY (`id_recipe_date`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla chefskiss.tb_recipe_date: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_recipe_date` DISABLE KEYS */;
INSERT INTO `tb_recipe_date` (`id_recipe_date`, `recipe_date`) VALUES
	(11, 'All'),
	(12, 'Birthday'),
	(13, 'Fathers Day'),
	(14, 'Mothers Day'),
	(15, 'Childrens Day'),
	(16, 'Christmas'),
	(17, 'Holy Week'),
	(18, 'Summer');
/*!40000 ALTER TABLE `tb_recipe_date` ENABLE KEYS */;

-- Volcando estructura para tabla chefskiss.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla chefskiss.tb_user: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`id_user`, `username`, `password`, `fullname`, `email`) VALUES
	(2, 'username', '$2y$12$uar5sGDIkDf8trLPKDy22OEYTF82TgxiM3dtXPMzOVDRXfvopBQmK', '', '');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
mysqlchefskisstb_imagetb_image