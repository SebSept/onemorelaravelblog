PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE "migrations" ("migration" varchar not null, "batch" integer not null);
INSERT INTO "migrations" VALUES('2014_05_07_195235_create_posts_table',1);
INSERT INTO "migrations" VALUES('2014_05_07_212157_add_title_to_posts_table',1);
INSERT INTO "migrations" VALUES('2014_05_14_195335_create_tags_table',1);
INSERT INTO "migrations" VALUES('2014_05_14_195927_create_tags_posts_pivot_table',1);
INSERT INTO "migrations" VALUES('2014_05_16_195317_create_comments_table',1);
INSERT INTO "migrations" VALUES('2014_05_30_112558_add_is_admin_field_to_comment_table',1);
CREATE TABLE "posts" ("id" integer not null primary key autoincrement, "slug" varchar not null, "teaser" varchar not null, "content" text not null, "published" tinyint not null, "created_at" datetime not null, "updated_at" datetime not null, "title" varchar not null default 'title');
INSERT INTO "posts" VALUES(1,'aut-ex-accusantium-quo-tenetur-harum','Ipsa ut pariatur sunt consectetur omnis magnam molestiae. Vitae quo dolore inventore magnam velit quia. Dolores ullam autem et aut.','Accusamus laborum numquam consequuntur odio repudiandae voluptates. Quis quasi ut soluta asperiores accusantium commodi. Excepturi est doloremque sint quae molestiae doloribus veniam qui. Hic magnam suscipit expedita ad consequatur sunt.
Ratione voluptatem consequatur autem sunt corrupti fuga non odio. Possimus nostrum saepe animi voluptas recusandae blanditiis. Debitis ad aliquam necessitatibus illum amet ea. Eum hic laboriosam molestiae eveniet accusantium totam.
Rem similique excepturi aut est. Dolorum reprehenderit omnis quas magni dignissimos. Amet quo quos et repellendus aperiam iure. Dolores tenetur sed asperiores ex quis.
Dolorem commodi nam voluptas sit possimus. Explicabo deleniti sed explicabo mollitia expedita repudiandae. Voluptates tenetur explicabo est laboriosam.
Iure eius recusandae libero illum. Aut quod aut tempore et beatae quia. Officiis perspiciatis error ut et officiis quia voluptatem voluptatem.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','In libero qui ut.');
INSERT INTO "posts" VALUES(2,'itaque-veritatis-eligendi-molestias-eaque','A sed illum repudiandae fugit eum sequi voluptatem. Minus molestiae omnis omnis eum non consequatur omnis. Esse dolor ipsam qui corrupti non aut quidem.','Consequatur omnis distinctio alias adipisci corrupti dolores. Sed eligendi qui doloribus.
Repudiandae itaque qui rerum et eius ullam aliquid. Tenetur maiores temporibus deserunt tenetur iure hic.
Ea reiciendis officiis quasi libero. Debitis quidem rerum aut distinctio odit. Tempora recusandae harum in quia quas.
Officiis et voluptatum sed quo qui iste. Provident est quis earum corporis. Natus aut aut repudiandae ducimus rerum suscipit. Vel est dolore dicta ab excepturi.
Recusandae consectetur est natus eligendi eum voluptatem aut. Possimus aut occaecati et magni architecto ipsum sint. Sit et sint doloremque quae praesentium.
Quas quaerat rerum deserunt. Consectetur voluptas corrupti nesciunt occaecati dolores ut exercitationem. Odit asperiores perspiciatis enim reiciendis nostrum error nostrum eligendi. Quae voluptatem facilis qui non illo perferendis.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Quia sunt quod non id quia.');
INSERT INTO "posts" VALUES(3,'provident-quisquam-at-aut-corporis-quis-et','Nulla voluptas unde explicabo laudantium. Ea optio vel modi. Blanditiis magnam velit enim dicta iusto adipisci. Eius quia ad ut autem rem necessitatibus et.','Cupiditate fugiat fuga fugit fugit sunt et fugit. Nihil et sunt possimus. Perspiciatis sapiente natus nisi earum expedita veniam.
Cupiditate ut eos beatae cumque deleniti. Ipsam iste quia recusandae et id rerum et. Debitis dolorem nihil laborum eos laboriosam id. Autem aut asperiores veniam et architecto aut.
Officia iure qui laudantium eum dolores qui quia expedita. Quia voluptatum quasi provident autem necessitatibus. Eos molestiae quasi ipsum eveniet voluptates sapiente. Enim qui dicta natus officia qui.
Unde earum aut consequatur itaque aperiam earum nisi sint. Debitis possimus consequuntur quod et. Et asperiores eum neque voluptatem eligendi.
Quos aliquid fuga saepe sequi. Non vel quis ullam veritatis esse. Ea quia voluptas voluptas debitis sunt voluptates.
Minus nemo ratione quidem iure sequi. Nesciunt voluptatem magni ut illum et earum assumenda quia. Ut eos autem sunt natus commodi hic provident tempora.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Qui amet ipsum sunt.');
INSERT INTO "posts" VALUES(4,'neque-aut-culpa-ex-sunt-incidunt-officiis-dolores','In voluptates eaque non illum aut totam. Aliquam quis libero sed qui veniam. Praesentium atque officiis qui quia consequatur. Magnam repellat maxime culpa recusandae sit consectetur.','Deserunt consectetur aut voluptas sint. Excepturi expedita et rem ipsa. Sint voluptas exercitationem qui asperiores. Ea voluptas quis voluptatem animi rerum autem quo. Sit fugit ipsum laudantium nobis accusamus a architecto expedita.
Esse cupiditate est dolor laudantium aut. Animi nulla et ipsam ex debitis illum. Error odio quis consequatur.
Dolorum qui commodi voluptates. Deleniti et sed corrupti voluptas vel et. Quam eum doloremque maxime et perspiciatis non officia assumenda.
Autem voluptas labore et reprehenderit. Pariatur veritatis sed beatae. Rerum voluptas asperiores cupiditate quia ut. Fuga est eaque voluptates doloribus eaque aut.
Odio voluptate ipsum velit quia sequi. Optio est minus ut quisquam voluptas. Incidunt perferendis ex pariatur ut ea. Doloremque libero animi fugit unde.
Sint et sit tempore sit ipsa nihil. Et magnam quos asperiores laboriosam laboriosam qui ut. Omnis nihil consequuntur sed. Hic ut rerum alias sed excepturi libero. Sit neque et at praesentium.',0,'2014-05-30 11:29:11','2014-05-30 11:29:11','Quo eos natus unde cum occaecati.');
INSERT INTO "posts" VALUES(5,'sit-et-sunt-dolorem-suscipit-vel-labore','Non et facere nihil voluptatem atque saepe dolores. Esse aut nemo velit labore in. Odio porro neque aperiam sint rerum excepturi sequi omnis. Minima voluptas incidunt dolorem maxime sed.','Deserunt doloribus sed qui porro similique quia dicta. Saepe cum voluptatibus esse. Atque et natus dolorem voluptatibus corporis ut et dicta. Delectus magnam a dignissimos. Odit vero nam et autem.
Dolorem est pariatur qui et. Explicabo nostrum qui amet quam enim esse voluptas. Vel accusantium qui sed. Impedit nemo sint mollitia consequatur quis voluptatem consectetur.
Eligendi vel pariatur sit quibusdam hic aut fugit. Magni ab aperiam reiciendis architecto sed dolor odit. Fugit animi et laboriosam eum culpa magnam dolore. Dolores dolor aut est est vero quasi autem.
Minima nemo perferendis ut voluptatem aut minima. Dicta velit ea perspiciatis voluptates quia.
Quae dolores ut debitis id. Necessitatibus corporis omnis alias dolores ipsa. Ut et atque quidem accusantium quidem. Quos at quis vero sunt.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Nobis sint qui aut nisi aut id eum quia molestiae.');
INSERT INTO "posts" VALUES(6,'doloremque-quia-id-ea-dolore-rem','Ea facilis et repellendus ut aut. Magni eius minus facilis optio doloribus. Harum illo repellat iste voluptatibus dolor minus. Ex saepe voluptatem laborum id vero impedit sequi temporibus. Corporis minima voluptas id qui sint.','Dolorem itaque porro id ab rerum. Quibusdam est soluta ipsum quibusdam. Eos vero sunt exercitationem et dolorem.
Nihil ipsum dolorum aut totam hic est temporibus. Deleniti veniam sint soluta nobis tenetur. Dolor laboriosam in provident laborum et libero voluptatibus molestiae.
Consequuntur dolore fuga non animi. Culpa non ea impedit velit est nesciunt accusantium. Ut sit dolorem alias optio ducimus deserunt vero. Assumenda aut sunt et ut porro omnis sunt.
Ducimus sit labore facilis quidem accusantium. Est sed ut repellat voluptas harum iusto.
Rem voluptas possimus exercitationem perspiciatis rerum sapiente repellat vel. Est omnis ipsa dicta ea. Vitae laboriosam sit veniam nihil earum. Sed rerum quod quos.
Porro dolor temporibus iusto veritatis eum ipsam eligendi. Repellendus numquam qui a nobis. Fuga deleniti debitis dicta voluptatem iure possimus asperiores. Repudiandae id praesentium tenetur nobis explicabo tempora ullam.',0,'2014-05-30 11:29:11','2014-05-30 11:29:11','Rerum repellat eligendi vitae.');
INSERT INTO "posts" VALUES(7,'qui-eum-voluptatem-et-et-amet','Aut provident illo ducimus. Nobis eligendi explicabo nihil sunt ut nisi ipsa. Et ullam tempora incidunt quia. Accusamus sint doloremque animi quasi id.','Fuga et est quia sint autem et laboriosam. Quia quia quis at esse. Et cupiditate totam ipsam architecto cum aut.
Et nihil quidem error eos. Dolore tenetur sunt beatae blanditiis repellat ullam eum. Et quae ut sequi omnis. Quis et magnam facilis voluptatem.
Quibusdam vero quis sed maiores deleniti. Quisquam ut quia animi.
Corporis explicabo expedita iste sequi rerum delectus facilis. Fugiat laboriosam dolorem et placeat modi sapiente suscipit. Et tenetur cupiditate doloremque corporis. Voluptatem ut maxime itaque harum.
Eum alias ab ut vero. Rerum labore natus molestiae id corporis unde. Quas beatae voluptate eaque voluptas aut omnis.
Excepturi quasi enim voluptatem velit in. Cumque laborum necessitatibus harum deleniti. Vitae rem omnis eos veniam. Vero et sequi non.
Est omnis dolores ut possimus quia modi consequatur. Ipsum qui accusamus et consequatur. Qui magnam eos ex.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Voluptatem saepe qui omnis consequatur voluptatum.');
INSERT INTO "posts" VALUES(8,'molestiae-dolorum-eligendi-sunt-laboriosam-dolores-non','Facilis magnam qui sit nemo natus. Ea et delectus ducimus ut.
Iure commodi ea eum voluptas. Et debitis nisi qui possimus. Velit impedit itaque doloremque qui qui. Ut alias rerum ut autem et.','In sed sit commodi laboriosam. Natus sapiente eius similique quis exercitationem. Provident neque id et unde beatae aliquam. Omnis aut cum ea assumenda earum.
Et atque eum excepturi sint. Animi aut quis ipsum sed suscipit. Rerum omnis aliquam in debitis sed consequatur quo nam.
Et eveniet magnam nemo sit blanditiis distinctio dignissimos. Enim occaecati sequi consequatur eos. Dolorem aliquam aut sint rerum velit sed corporis. Eaque distinctio aut dolor quis.
Delectus itaque aut officia velit aperiam. Placeat sunt cum dignissimos. Reprehenderit aut aut doloribus quidem voluptatibus. Quia quidem quia qui dolorem dolores quas cumque. Soluta velit sit nesciunt sint esse.
Voluptate consequuntur animi dolore rem numquam. In dolorem et vero architecto aut reiciendis. Voluptate voluptatem doloremque voluptates deserunt voluptas corrupti.',0,'2014-05-30 11:29:11','2014-05-30 11:29:11','Sed impedit ab dolor illo velit.');
INSERT INTO "posts" VALUES(9,'ad-inventore-dolore-rem-ut','Non deserunt est odit voluptatum temporibus aut provident illum. Est explicabo consequuntur ea ut. Natus optio labore sequi reiciendis maiores voluptas tenetur.','Ipsum cum earum debitis commodi. Amet minima dolor dolor quo exercitationem et. Maxime et est voluptate excepturi. Accusantium deserunt aut vitae iste porro veritatis.
Nihil consequuntur voluptatem consectetur cumque et illum eveniet. Quaerat est in repellendus qui perferendis et modi. Non dolorem labore praesentium est.
Consequatur ut sit ad earum delectus qui consequuntur velit. Ipsam assumenda nobis ut voluptate labore dolor. Voluptatum dolores numquam ea vel repellat distinctio.
Autem ipsa non eum quo occaecati voluptatibus amet. Aut et fugit expedita et dicta sint. Similique necessitatibus error libero est.
Porro vel modi aspernatur autem fugiat. Delectus ea aut veritatis eligendi quidem nemo delectus. Natus at eaque ipsam est molestiae delectus odio. Tempora similique consectetur suscipit nam iusto nihil.
Reprehenderit ut voluptas corporis quae cum occaecati. Ipsum voluptate ut ut ad. Rerum ab quod accusamus voluptas. Ipsum libero voluptatem quam deserunt aut quis.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Dolor qui qui velit labore ex.');
INSERT INTO "posts" VALUES(10,'inventore-sit-autem-incidunt-quidem-deleniti-voluptas-dolore','Recusandae temporibus rerum voluptatibus doloribus harum quasi quas. Iure reprehenderit optio ducimus iusto. Et est numquam saepe dolores.','Ipsum doloremque sapiente hic rerum cumque dolores quaerat. Nesciunt dolorem ratione quae voluptates tempora dignissimos. Voluptatem enim eum numquam nemo consequatur cum quas.
Quia voluptas quia odit distinctio ut nihil velit. Exercitationem enim nemo earum vero in et et. Ut cum odio ipsa minus.
Tempora et aspernatur dolor molestiae vel possimus in. Eaque ut dolore necessitatibus beatae excepturi alias. Exercitationem fugit sed et omnis repellat. Ut non iste hic repellat veritatis.
Quia nisi et quas qui eum ut. Ratione nihil et ut non minima vel. Ipsam omnis praesentium sed nemo amet.
Laboriosam et voluptas voluptatem at mollitia. Unde libero officia odit repellat. Eos omnis eum laboriosam velit.
A a dolorem harum voluptatem libero. Ut minus mollitia et sed voluptatem laborum ullam. Sit porro praesentium quos non vel odit.
Et maiores qui qui est soluta. Quasi alias rem voluptate odio voluptatem ad a. Et culpa quam esse repellat et.',0,'2014-05-30 11:29:11','2014-05-30 11:29:11','Assumenda vero iusto sed in.');
INSERT INTO "posts" VALUES(11,'iusto-ipsa-molestiae-deserunt-quia','Sint sit fugit totam labore. Recusandae accusantium voluptas qui omnis ex aliquid.
Ea modi id excepturi voluptate. Id labore ex ex omnis omnis sint. Consectetur blanditiis labore dignissimos minus rem dolor at. Ut ullam animi totam.','Qui rem mollitia natus perferendis qui. Soluta eum cupiditate sit eligendi accusantium itaque. Est nesciunt est aut tempora vitae.
Quasi eius fugit perspiciatis odit tempore ut sunt. Possimus sequi ea nobis ratione ab rerum. Laboriosam sed explicabo eaque est necessitatibus. Odit sapiente quisquam provident quia voluptatem laudantium et.
Repellat reprehenderit quis impedit assumenda. Sunt dolores et dolore voluptas. Perferendis error assumenda esse sint magni sed. Velit doloremque magni eum doloribus ullam tempore.
Sit impedit corporis voluptas. Laboriosam omnis consequatur ducimus saepe doloremque. Sit facilis itaque similique consequatur eaque.
Earum aut neque est possimus consequuntur minima qui. At ut omnis perspiciatis voluptate unde dolores. Dolorum eligendi maxime qui voluptas aut adipisci id.
Id aperiam rerum sint sunt impedit alias cumque. Et nam laborum quo aut quos nostrum. Cupiditate rerum eius corporis quo quidem dolores aut id.',0,'2014-05-30 11:29:11','2014-05-30 11:29:11','Reiciendis a sunt.');
INSERT INTO "posts" VALUES(12,'qui-corporis-in-dolorum-autem-a-voluptas-quis','Et sit rem non delectus. Dolor qui ab dicta. Ipsa id aut nemo.
Mollitia error repellendus ea ut voluptatem. Nam voluptate porro libero expedita laborum. Nostrum molestiae ut excepturi labore. Inventore maiores aut sequi et.','Quia explicabo voluptas libero laboriosam et consequatur alias. Consequatur ad sed laborum adipisci. Mollitia recusandae voluptas necessitatibus aut et quibusdam quasi.
Neque autem voluptatem eos est ea. Maiores optio voluptatibus et et vitae. Officia quo qui sed voluptatibus. Consequatur iusto adipisci exercitationem sed.
Est ipsa eligendi facilis voluptatem voluptatem libero aut facilis. Possimus repellendus velit sed. Quo ab aspernatur aliquam sit vitae. Quo voluptas voluptates corporis iste.
Exercitationem sint tempore accusamus esse. Et ut iure eum nobis repellendus suscipit quia aut. Temporibus et quam ab occaecati voluptas fugiat. Accusantium suscipit error voluptatibus quod officiis vitae.
Minima aut quaerat sed necessitatibus ut error. Mollitia rem deleniti aut et aut repellat quasi labore. Qui consequatur qui quo laborum autem dolorum.
Optio distinctio aut dolores quae. Eum cum ut ducimus harum. Eum qui est sunt eos. Voluptas dolorem aperiam enim ipsa voluptas et.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Aut voluptas quia repudiandae est at voluptatibus nulla.');
INSERT INTO "posts" VALUES(13,'quidem-maxime-libero-nulla-porro','Voluptatem in voluptatem dignissimos consequatur. Doloremque exercitationem accusamus provident et. Qui quos enim dicta exercitationem aut a.','Reprehenderit a animi nesciunt laudantium ullam repellat. Aut quia at repellat et. Vero neque magnam dicta blanditiis quos similique doloribus. Veniam iste expedita deserunt et.
Et quam a molestiae ullam. Repellendus et hic voluptatum. Exercitationem voluptas magnam eum dicta. Odio totam iure sint voluptatum velit.
Doloremque qui esse non accusantium non quae. Est nostrum veniam ut facere. Veritatis porro at dolorem sed nulla possimus officia.
Placeat deleniti magnam voluptas molestias labore et sunt illo. Inventore ut nisi enim dolorum. Est accusantium officiis vero.
Corrupti et voluptas consequatur expedita quibusdam quo delectus. Sunt magni dicta aut laboriosam nemo. Saepe corrupti dicta atque dolorum. Qui sapiente excepturi ut consequatur sequi qui ad.',0,'2014-05-30 11:29:11','2014-05-30 11:29:11','Atque reprehenderit ducimus rerum.');
INSERT INTO "posts" VALUES(14,'odit-earum-itaque-laborum','Iste vero molestias repudiandae asperiores dignissimos. Enim fugit maxime accusamus qui iusto. Aliquid tenetur eos assumenda quia. Officia voluptatem eveniet quia aut quisquam.','Reprehenderit fugiat quae iste rerum quis. Fugiat accusamus quo blanditiis quo. Voluptate enim maxime veniam debitis quos. Libero libero provident eos ratione aut.
Magni est omnis tenetur veniam error tenetur rerum. Praesentium fuga ipsa necessitatibus a sapiente autem. Ut et ratione suscipit autem qui aliquid laboriosam. Tempore aut qui tempora.
Consequuntur ab sed tenetur accusamus esse est quis. Est voluptatum rem quasi molestiae quisquam nobis quia. Qui qui aliquid iste fugit. Nulla ut recusandae dolorem corporis voluptas in fugiat autem. Similique ut deleniti optio consectetur.
Recusandae aut nemo ipsa ipsam. Tenetur distinctio tempora tempora reiciendis. Minima consequuntur et in maxime consequatur fugit. Doloremque repudiandae enim suscipit incidunt reprehenderit ut.
Cupiditate quibusdam hic distinctio et assumenda quia ab. Qui sunt corrupti dolores accusamus quis quam est perspiciatis. Atque aut at est est.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Est sit doloremque.');
INSERT INTO "posts" VALUES(15,'eius-impedit-ut-officia-fuga-ut','Magni sapiente necessitatibus perspiciatis vero voluptatem. Eius sequi odio nulla asperiores. Et praesentium aliquid cum dolores rerum occaecati.','Reprehenderit hic neque non quasi et incidunt suscipit. Illo maxime id cumque in natus deserunt. Quam et officiis aperiam eum ut a non.
Quia accusantium placeat vero debitis excepturi voluptas quidem. Porro laborum reprehenderit earum sint accusantium sint aspernatur. Voluptatem id reiciendis molestiae et deserunt sequi.
Error expedita dignissimos quibusdam amet et occaecati. Doloribus odit non similique. Molestias architecto eos beatae aut. Totam necessitatibus unde laudantium vel rerum.
Temporibus pariatur commodi est ipsa inventore id. Quo facere numquam quasi deleniti voluptatem quia. Dolore consectetur quae consequatur odio voluptas quo. Illum quasi consequatur voluptas unde praesentium.
Dolores ratione laudantium unde id dolorem corrupti debitis. Mollitia et delectus blanditiis sunt ipsam nostrum eum. Qui dolor non quia quo commodi et.
Quidem aliquam odit sed quas aspernatur optio. Soluta dicta temporibus cumque non qui.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Vel cumque illum.');
INSERT INTO "posts" VALUES(16,'accusantium-reprehenderit-dolore-velit-consectetur-rem-dolores','Sunt natus quia provident aut. Alias ut quia sequi est. Tenetur tenetur libero consequatur et sunt aut assumenda.
Delectus enim unde id. Sit vel est perspiciatis. Et velit architecto nemo et.','Rerum quia laudantium alias consequatur sunt ducimus doloribus. Quam architecto aut inventore minima magni. Accusantium temporibus qui velit quia officiis ratione et. Sint sint laboriosam qui est tempore veritatis recusandae.
Et deserunt quibusdam voluptatibus maiores. Aliquam atque quas architecto quas architecto eum officiis. Sed autem quasi quia numquam aut rem. Commodi reiciendis deserunt voluptatem rerum magni maiores quo.
Necessitatibus dolor officiis et optio dicta neque. In vero maiores qui sit atque. Et et ducimus aliquam quidem ipsum.
Commodi at ut quas sed voluptates deleniti. Hic sapiente inventore et aperiam iste. Ut omnis fuga dolor aut.
Quas nobis ipsam eum eum velit. Sequi assumenda totam qui eligendi nemo. Fuga accusamus soluta autem voluptatem animi voluptate. Similique dolorum dicta nisi deserunt est vitae ullam.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Rerum similique et expedita et ut.');
INSERT INTO "posts" VALUES(17,'reprehenderit-soluta-delectus-ut-adipisci-quos-expedita','Repudiandae fuga expedita porro quae commodi. Consequatur amet in minus quaerat blanditiis. Et dolore officia nihil quis dolores. Et quasi est dolorem maxime et eos veniam totam.','Soluta rerum cupiditate dolorem porro molestiae quo. Quia sunt dolore est dignissimos magnam. Est tempora in omnis eveniet alias ipsam.
Consectetur perspiciatis illum possimus accusamus esse quae. Voluptates adipisci dolorum laudantium et mollitia numquam qui et. Minima commodi dolores atque eos ut. Minus porro hic eveniet rerum et dolor.
Quis eum adipisci laborum quidem aut. Nam ea doloremque dicta omnis suscipit rerum rem.
Culpa molestias dolor magnam alias praesentium ducimus repellendus cumque. Mollitia eligendi blanditiis explicabo. In natus necessitatibus et sed maiores quod.
Id ut soluta laborum cupiditate fugit dolorum. Qui omnis aut aliquam quasi et. Aspernatur repellat ipsa ipsa non quasi non iure dolorem.
Facilis similique nostrum inventore recusandae perspiciatis at voluptatem. Quia et voluptatem quia dolorem pariatur ex delectus. Eos enim cupiditate ut voluptas impedit voluptatem dicta. Qui id ea est exercitationem.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Aliquid magnam voluptatem adipisci nemo.');
INSERT INTO "posts" VALUES(18,'eligendi-exercitationem-nobis-voluptas-dolor-maiores-est-accusantium','Tenetur aut exercitationem necessitatibus accusamus placeat enim. Quam nihil mollitia atque error. Totam ab fugiat in voluptatibus impedit similique quod. Et neque qui voluptatibus et corporis reprehenderit.','Vel nihil qui magnam quia sit quam. Sint ut praesentium suscipit laboriosam velit aspernatur. Qui facere occaecati fuga aut labore quis.
Sit provident non nisi ut esse. Modi et veritatis amet reprehenderit. Non aspernatur sed ipsam maxime accusamus. Ea rerum aliquid ut et quas ducimus.
Omnis et doloremque quis ullam non voluptatem. Omnis quia sed voluptatem non aperiam. Animi adipisci perferendis quia est officiis et. Qui perspiciatis fuga aliquid veritatis aut sed.
Consequuntur error nostrum distinctio nemo aut vero ut. In unde in et libero sit minima incidunt. Ea dolorem possimus iure qui ut.
Dolores sit corrupti non ipsam. Dolorem ut quis dolores fugiat numquam assumenda. Atque aperiam esse repellat totam itaque. Nobis autem voluptas laudantium natus rerum odit. Quis amet ad accusamus quae molestias.
Occaecati autem molestiae qui aut similique praesentium et. Corporis necessitatibus similique sequi. Ut voluptate nemo tempora accusamus.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Voluptates natus et aut.');
INSERT INTO "posts" VALUES(19,'veritatis-et-vel-sit-omnis-laudantium-error','Aut suscipit corporis quaerat sequi iure qui quo. Quibusdam quas necessitatibus consequatur accusamus aut. Accusantium iure minus aliquid vitae dolore.','Vero voluptatum aut quia occaecati libero ipsam corporis. Debitis molestiae sed et asperiores qui eaque. Dolorem accusamus adipisci tempore esse impedit. Fuga sit dolores quaerat omnis hic est quia.
Aut est similique distinctio sed fuga quia. Ea est voluptate ratione. Ullam incidunt quae sed tenetur qui.
Dolorem laudantium accusantium recusandae repellendus veritatis sunt pariatur. Eligendi dolorum eum et vel laudantium qui. Ipsum veritatis vero corrupti libero dolorem sed quam. Distinctio nam neque necessitatibus debitis et.
Explicabo quisquam placeat et molestiae ea mollitia sed voluptatem. Sit quis rerum provident. Illo ea accusamus laudantium ratione repudiandae. Recusandae beatae aut pariatur veniam.
Dicta eligendi beatae qui rem debitis cum. Dignissimos necessitatibus nostrum quos neque cum harum commodi maiores.',1,'2014-05-30 11:29:11','2014-05-30 11:29:11','Quisquam voluptates officia quisquam.');
INSERT INTO "posts" VALUES(20,'voluptatem-dignissimos-natus-maiores-voluptatem-aliquam-sit-corrupti','Et nisi nihil modi ut. Dolores nostrum repudiandae vel iure veniam vero quo. Dicta doloribus sint eveniet libero rerum pariatur culpa. Aut soluta eos mollitia eligendi maxime quia.','Vitae quaerat porro delectus voluptatem. Porro dolorem numquam sed distinctio facilis. Voluptatem rem dolorem omnis debitis. Veritatis perferendis eius velit tenetur commodi odit.
Nesciunt et dolor dolor itaque sint ratione non. Dolorem aperiam esse quia non. Modi repellat dignissimos eius praesentium magni ducimus.
Culpa corrupti sed quis at ea odio fugit. Incidunt quos asperiores architecto odio sint in assumenda. Pariatur velit dolores animi voluptatibus numquam officia labore. Aperiam est quia itaque enim.
Voluptas voluptatem cupiditate vero. Asperiores quo doloremque sint corrupti. Ab neque qui et accusantium quia eligendi.
In iure nam dolore. Minima aspernatur eos adipisci ea delectus odio consectetur. Et laudantium rerum omnis a quisquam.
Suscipit repellendus laborum ut earum nihil a aperiam. Molestias fugiat eveniet nihil quidem fuga fuga repellat. Id omnis est dicta.',0,'2014-05-30 11:29:11','2014-05-30 11:29:11','Ullam voluptatum quae rerum ipsa.');
CREATE TABLE "tags" ("id" integer not null primary key autoincrement, "title" varchar not null);
INSERT INTO "tags" VALUES(1,'a');
INSERT INTO "tags" VALUES(2,'accusamus');
INSERT INTO "tags" VALUES(3,'culpa');
INSERT INTO "tags" VALUES(4,'debitis');
INSERT INTO "tags" VALUES(5,'delectus');
INSERT INTO "tags" VALUES(6,'omnis');
CREATE TABLE "post_tag" ("post_id" integer not null, "tag_id" integer not null);
INSERT INTO "post_tag" VALUES(1,1);
INSERT INTO "post_tag" VALUES(1,2);
INSERT INTO "post_tag" VALUES(1,3);
INSERT INTO "post_tag" VALUES(1,7);
INSERT INTO "post_tag" VALUES(10,2);
INSERT INTO "post_tag" VALUES(10,3);
INSERT INTO "post_tag" VALUES(10,5);
INSERT INTO "post_tag" VALUES(10,7);
INSERT INTO "post_tag" VALUES(11,3);
INSERT INTO "post_tag" VALUES(11,4);
INSERT INTO "post_tag" VALUES(11,5);
INSERT INTO "post_tag" VALUES(11,6);
INSERT INTO "post_tag" VALUES(11,7);
INSERT INTO "post_tag" VALUES(12,1);
INSERT INTO "post_tag" VALUES(12,3);
INSERT INTO "post_tag" VALUES(12,4);
INSERT INTO "post_tag" VALUES(12,5);
INSERT INTO "post_tag" VALUES(12,7);
INSERT INTO "post_tag" VALUES(13,2);
INSERT INTO "post_tag" VALUES(13,3);
INSERT INTO "post_tag" VALUES(13,4);
INSERT INTO "post_tag" VALUES(13,5);
INSERT INTO "post_tag" VALUES(13,6);
INSERT INTO "post_tag" VALUES(14,1);
INSERT INTO "post_tag" VALUES(14,2);
INSERT INTO "post_tag" VALUES(14,3);
INSERT INTO "post_tag" VALUES(14,4);
INSERT INTO "post_tag" VALUES(14,6);
INSERT INTO "post_tag" VALUES(15,2);
INSERT INTO "post_tag" VALUES(15,3);
INSERT INTO "post_tag" VALUES(15,5);
INSERT INTO "post_tag" VALUES(15,6);
INSERT INTO "post_tag" VALUES(16,1);
INSERT INTO "post_tag" VALUES(16,3);
INSERT INTO "post_tag" VALUES(16,4);
INSERT INTO "post_tag" VALUES(16,7);
INSERT INTO "post_tag" VALUES(17,3);
INSERT INTO "post_tag" VALUES(17,4);
INSERT INTO "post_tag" VALUES(17,5);
INSERT INTO "post_tag" VALUES(17,6);
INSERT INTO "post_tag" VALUES(17,7);
INSERT INTO "post_tag" VALUES(18,2);
INSERT INTO "post_tag" VALUES(18,3);
INSERT INTO "post_tag" VALUES(18,5);
INSERT INTO "post_tag" VALUES(18,7);
INSERT INTO "post_tag" VALUES(19,1);
INSERT INTO "post_tag" VALUES(19,2);
INSERT INTO "post_tag" VALUES(19,4);
INSERT INTO "post_tag" VALUES(19,6);
INSERT INTO "post_tag" VALUES(19,7);
INSERT INTO "post_tag" VALUES(2,1);
INSERT INTO "post_tag" VALUES(2,2);
INSERT INTO "post_tag" VALUES(2,3);
INSERT INTO "post_tag" VALUES(2,6);
INSERT INTO "post_tag" VALUES(20,2);
INSERT INTO "post_tag" VALUES(20,3);
INSERT INTO "post_tag" VALUES(20,6);
INSERT INTO "post_tag" VALUES(20,7);
INSERT INTO "post_tag" VALUES(3,1);
INSERT INTO "post_tag" VALUES(3,3);
INSERT INTO "post_tag" VALUES(3,5);
INSERT INTO "post_tag" VALUES(3,6);
INSERT INTO "post_tag" VALUES(3,7);
INSERT INTO "post_tag" VALUES(4,1);
INSERT INTO "post_tag" VALUES(4,2);
INSERT INTO "post_tag" VALUES(4,3);
INSERT INTO "post_tag" VALUES(4,5);
INSERT INTO "post_tag" VALUES(4,6);
INSERT INTO "post_tag" VALUES(5,1);
INSERT INTO "post_tag" VALUES(5,2);
INSERT INTO "post_tag" VALUES(5,3);
INSERT INTO "post_tag" VALUES(5,6);
INSERT INTO "post_tag" VALUES(5,7);
INSERT INTO "post_tag" VALUES(6,2);
INSERT INTO "post_tag" VALUES(6,3);
INSERT INTO "post_tag" VALUES(6,5);
INSERT INTO "post_tag" VALUES(6,6);
INSERT INTO "post_tag" VALUES(7,1);
INSERT INTO "post_tag" VALUES(7,2);
INSERT INTO "post_tag" VALUES(7,3);
INSERT INTO "post_tag" VALUES(7,5);
INSERT INTO "post_tag" VALUES(7,6);
INSERT INTO "post_tag" VALUES(7,7);
INSERT INTO "post_tag" VALUES(8,1);
INSERT INTO "post_tag" VALUES(8,2);
INSERT INTO "post_tag" VALUES(8,4);
INSERT INTO "post_tag" VALUES(8,6);
INSERT INTO "post_tag" VALUES(9,3);
INSERT INTO "post_tag" VALUES(9,4);
INSERT INTO "post_tag" VALUES(9,5);
INSERT INTO "post_tag" VALUES(9,6);
CREATE TABLE "comments" ("id" integer not null primary key autoincrement, "title" varchar not null, "author_name" varchar not null, "author_site" varchar not null, "content" text not null, "published" tinyint not null default '0', "post_id" integer not null, "created_at" datetime not null, "updated_at" datetime not null, "is_admin" tinyint not null default '0');
INSERT INTO "comments" VALUES(1,'Doloremque labore optio veritatis eum.','Alfred-André Gilles','http://maury.com/harum-et-sapiente-assumenda-quia-vel-modi-deleniti-eum','À partir de ce bonheur idéal, comme à la fois, elle a contre elle les mollesses de la main sur son dos, et qui, traînant avec tant de journées à Lestiboudois! Puis l''enfant avait froid et.',1,4,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(2,'Quo minus consequatur.','Arnaude Lopes','http://chauvet.com/vitae-omnis-velit-qui-mollitia-quae-sed-quidem','C''était un enjôleur, un rampant... -- Ah! ne l''écoutez pas, madame Bovary! Ce matin même, il a fallu que j''aille dans le quartier Latin, avec les dépendances de la ferme, on causait de ce.',1,8,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(3,'Qui officiis dolorum totam odio.','Augustin Parent','http://potier.com/est-dolores-quis-quos-sapiente-voluptas-reprehenderit','Et il allongeait son bras un flacon d''eau de Cologne qu''avait sa bru. En effet, elle tendit la main sur votre front. J''ai cru qu''un étourdissement vous prenait. Puis, se ravisant: -- Oh! ne bouge.',1,8,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(4,'Quia debitis.','Brigitte Leger-Chauveau','http://www.bousquet.com/asperiores-totam-sed-voluptatibus-tempore-vel-sit-et-voluptatem','Rouen. Celui-là était ministre du roi Louis XII. Il a fait tant de mépris pour rien, ni pour personne; et elle s''endormait un peu les cendres du foyer, car un peu de duvet noir. On eût dit qu''un.',1,4,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(5,'Distinctio est labore excepturi excepturi.','Charles-Sébastien Gomes','https://www.camus.com/qui-laborum-esse-numquam-recusandae','Alors elle fit la jeune femme que ces lacs des montagnes où le soleil sur ses genoux. Elle avait tout tenté. Il n''y comprit rien; il avait l''aspect d''un brave, avec l''entrain facile d''un commis.',1,9,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(6,'Ea aut explicabo voluptatum voluptatum.','Christine Martel','https://www.valette.com/omnis-voluptatem-quibusdam-aut-cumque','On entendait le bruit des éclats de colère, puis des râles élégiaques d''une douceur infinie, et les rideaux fermés du petit berceau faisaient comme une stupéfaction qui se répète dans la.',1,14,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(7,'Exercitationem voluptas ducimus quas modi.','David Barbier-Remy','http://www.cordier.org/','Mais vous le demande, si ce n''était pas possible que l''on y est obligé continuellement d''avoir la plume juste au moment où Justin vint le soir, n''alla pas chez ses voisins, et, quand elle.',0,5,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(8,'Ratione harum voluptatem optio explicabo.','Denis Pierre-Alexandre','https://www.charles.net/in-nam-animi-sequi','Au bas de leur jupon, et les papillons de nuit tournoyaient autour de lui faire remettre au presbytère dans la prairie, où elle vivait encore, il adopta ses prédilections, ses idées; il.',1,2,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(9,'Velit ullam consectetur vero placeat.','Dominique Faure','http://laporte.net/sed-ipsa-ut-unde','Vous avez raison, interrompit l''apothicaire, c''est le genre. Mais, soit qu''il n''eût pas failli à la ferme et si calme, si douce à la bataille de Montlhéry, le 16 juillet 1465. Léon, se mordant.',0,12,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(10,'Necessitatibus earum sit.','Jacques Cousin-Da Costa','http://www.barre.org/fugiat-fuga-totam-sed-cum.html','Mais au crépuscule, lorsque, le menton dans sa compagnie. Il avait des aigreurs. Enfin les trois s''asseoir sur l''estrade, de longs cordons verts entrelacés. L''orangerie, que l''on suive le bas de.',1,12,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(11,'Iusto ut amet aut.','Lorraine de la Menard','http://www.martel.com/ab-et-quo-et-porro-voluptatum.html','Mais les plus belles, de ses tubercules, et même le plâtre, s''écaillant à la fin du dîner. Un garde-chasse, guéri par les matins d''été, le soleil rouge se couchant. Qu''il devait faire bon.',1,18,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(12,'Sequi est nihil ut quis voluptatem debitis.','Louis Pons-Lebon','https://www.martinez.com/iste-qui-nulla-voluptatem-corporis-quae-corrupti-autem-reprehenderit','Binet, tout entier sur sa robe, ou le pauvre homme, à cette bonne chambre pleine de causeries, de rêves en commun. Ils parlèrent de leur maison, dans la cuisine. Les enfants s''étaient endormis.',1,8,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(13,'Deleniti pariatur perspiciatis omnis facere corrupti dolorum architecto maxime.','Lucas Leger','http://maurice.org/rem-vel-suscipit-aspernatur-voluptatem-reiciendis-quia-non','Elle l''avait envoyée aux aguets pour détourner Bovary; et elles devenaient plus nombreuses en s''écartant un peu. Les chevaux soufflaient. Le cuir des fortes bottes. Les dames de la rivière, dans.',1,15,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(14,'Odit sint consequatur repellendus deleniti quibusdam sed sunt nulla numquam.','Luce Lesage','https://www.lombard.com/nemo-accusantium-harum-esse-dolores-ea-iste','Dieu des bonnes soeurs, et faisait servir tout à coup: -- Tu vas te fatiguer, ma chérie, dit Bovary. Continuez. -- Je ne... sais pas, balbutia le jeune homme entama l''éloge de Lagardy dans le dos.',0,9,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(15,'Quibusdam ut sint quam qui molestias.','Océane Blanc','http://www.brunel.fr/repellendus-eos-nostrum-et-accusamus-in-sequi-quisquam-qui.html','Je l''ai roulé, vous avez peur, par hasard? -- Moi, je ne suis pas de s''y trouver. Dès qu''il entendait la rumeur de la rivière dans la cathédrale. TROISIÈME PARTIE I Nous étions à l''Étude, il.',1,4,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(16,'Et enim atque ea et.','Olivier-Jean Martin','http://www.rocher.com/','Celse, après quinze siècles d''intervalle, la ligature immédiate d''une artère; ni Dupuytren allant ouvrir un abcès à travers Quatremares, Sotteville, la Grande-Chaussée, la rue Nationale,.',1,17,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(17,'Assumenda asperiores rem.','Robert Berger','http://charles.net/est-cumque-officiis-est-facere.html','Et il agita son journal de modes, sortit, fuma un cigare, remonta trois rues, songea qu''il était allé au marché d''Argueil pour y vendre son cheval, qu''il bâtonnait à grands pas, faisant sonner.',1,10,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(18,'Ab excepturi eaque.','Rémy Francois-Petit','https://www.normand.com/in-a-omnis-porro','Elle partit dès le carrefour d''un bois, avec une tête de réminiscences, d''idées, s''échappait à la ville, depuis le théâtre jusqu''au boulevard. Madame s''acheta un plan de Paris, titres de.',1,2,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(19,'Nihil consequatur id.','Vincent Ruiz','http://dijoux.com/','Il a, l''année dernière, aidé nos gens à rentrer dans la voiture. Et la pauvre fille, émue, lui tendit un papier gris. Elle lut: «Jean-Antoine d''Andervilliers d''Yverbonville, comte de.',1,9,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(20,'Sed ipsam deleniti ratione voluptate optio.','Xavier Lejeune','http://www.devaux.fr/','Et puis ils mangèrent et trinquèrent, tout en sueur, mais sans prendre garde aux cahots, accrochant par-ci par- là, ne s''en souciant, démoralisé, et presque commettre un sacrilège. Mais un.',1,2,'2014-05-30 11:29:12','2014-05-30 11:29:12',0);
INSERT INTO "comments" VALUES(21,'yia','zer','zer','non pub',1,1,'2014-05-30 11:31:51','2014-05-30 11:33:27',0);
INSERT INTO "comments" VALUES(22,'looged','autosubmit','sdf','sfdsf',1,1,'2014-05-30 11:35:39','2014-05-30 11:35:39',1);
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('posts',20);
INSERT INTO "sqlite_sequence" VALUES('tags',6);
INSERT INTO "sqlite_sequence" VALUES('comments',22);
COMMIT;
