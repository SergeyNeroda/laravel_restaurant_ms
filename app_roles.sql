-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 19 2020 г., 19:23
-- Версия сервера: 5.7.27-0ubuntu0.18.04.1
-- Версия PHP: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `app_roles`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Випічка', NULL, NULL),
(2, 'Гарніри', NULL, NULL),
(3, 'Десерти', NULL, NULL),
(4, 'Закуски', NULL, NULL),
(5, 'Каші', NULL, NULL),
(6, 'М\'ясні страви', NULL, NULL),
(7, 'Овочеві страви', NULL, NULL),
(8, 'Рибні страви', NULL, NULL),
(9, 'Салати', NULL, NULL),
(10, 'Фруктові страви', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ingredient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`id`, `name_ingredient`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'борошно', 7, '2019-06-05 03:09:37', '2019-09-21 05:36:11'),
(2, 'масло', 3, '2019-06-05 03:09:51', '2019-06-05 03:09:51'),
(3, 'цукор', 5, '2019-06-05 03:10:08', '2019-06-05 03:10:08'),
(4, 'ванільний цукор', 7, '2019-06-05 03:10:26', '2019-06-05 03:10:26'),
(5, 'молоко', 1, '2019-06-05 03:10:41', '2019-06-05 03:10:41'),
(6, 'свіжа полуниця', 5, '2019-06-05 03:11:00', '2019-06-05 03:11:00'),
(7, 'полуниця', 2, '2019-06-05 03:13:44', '2019-06-05 03:13:44'),
(8, 'апельсини', 1, '2019-06-05 03:13:55', '2019-06-05 03:13:55'),
(9, 'кола', 3, '2019-06-05 03:14:02', '2019-06-05 03:14:02');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(40, '2013_03_05_114732_create_roles_table', 1),
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_03_07_130124_create_categories_table', 1),
(44, '2019_03_08_190102_create_products_table', 1),
(45, '2019_04_03_062434_create_units_table', 1),
(46, '2019_04_03_073008_create_suppliers_table', 1),
(47, '2019_04_03_081819_create_ingredients_table', 1),
(48, '2019_04_03_082036_create_recipes_table', 1),
(49, '2019_04_21_083629_create_tables_table', 1),
(50, '2019_04_21_084024_create_statuses_table', 1),
(51, '2019_04_21_092508_create_orders_table', 1),
(52, '2019_04_21_094618_create_order_products_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `table_id` int(10) UNSIGNED NOT NULL,
  `summ` int(11) NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `table_id`, `summ`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 3, 13, 1624, 4, '2019-06-05 03:23:13', '2019-06-05 03:27:35'),
(2, 3, 4, 690, 3, '2019-06-01 03:23:25', '2019-06-05 03:24:38'),
(3, 3, 6, 467, 4, '2019-06-02 03:23:40', '2019-09-21 05:38:07'),
(4, 3, 6, 467, 2, '2019-05-15 03:23:41', '2019-09-12 08:37:33'),
(5, 3, 6, 467, 1, '2019-06-05 03:23:42', '2019-06-05 03:23:42'),
(6, 3, 3, 934, 1, '2019-06-05 03:27:14', '2019-06-05 03:27:14'),
(7, 3, 13, 3471, 1, '2019-06-05 03:27:29', '2019-06-05 03:27:29'),
(8, 3, 15, 4607, 4, '2019-06-05 05:08:14', '2019-06-05 05:10:32'),
(9, 3, 15, 5339, 1, '2019-09-21 05:37:40', '2019-09-21 05:37:40');

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 2, '2019-06-05 03:23:13', '2019-06-05 03:23:13'),
(2, 1, 8, 2, '2019-06-05 03:23:13', '2019-06-05 03:23:13'),
(3, 2, 1, 2, '2019-06-05 03:23:25', '2019-06-05 03:23:25'),
(4, 3, 16, 1, '2019-06-05 03:23:40', '2019-06-05 03:23:40'),
(5, 4, 16, 1, '2019-06-05 03:23:41', '2019-06-05 03:23:41'),
(6, 5, 16, 1, '2019-06-05 03:23:42', '2019-06-05 03:23:42'),
(7, 6, 19, 2, '2019-06-05 03:27:14', '2019-06-05 03:27:14'),
(8, 7, 17, 3, '2019-06-05 03:27:29', '2019-06-05 03:27:29'),
(9, 7, 27, 3, '2019-06-05 03:27:29', '2019-06-05 03:27:29'),
(10, 7, 30, 3, '2019-06-05 03:27:29', '2019-06-05 03:27:29'),
(11, 8, 4, 1, '2019-06-05 05:08:14', '2019-06-05 05:08:14'),
(12, 8, 2, 10, '2019-06-05 05:08:14', '2019-06-05 05:08:14'),
(13, 8, 6, 2, '2019-06-05 05:08:14', '2019-06-05 05:08:14'),
(14, 9, 3, 1, '2019-09-21 05:37:40', '2019-09-21 05:37:40'),
(15, 9, 5, 2, '2019-09-21 05:37:40', '2019-09-21 05:37:40'),
(16, 9, 4, 5, '2019-09-21 05:37:40', '2019-09-21 05:37:40'),
(17, 9, 1, 3, '2019-09-21 05:37:40', '2019-09-21 05:37:40'),
(18, 9, 7, 1, '2019-09-21 05:37:40', '2019-09-21 05:37:40'),
(19, 9, 2, 1, '2019-09-21 05:37:40', '2019-09-21 05:37:40');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spl_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `info`, `id_category`, `image`, `spl_price`, `created_at`, `updated_at`) VALUES
(1, 'Яєшня', '1', 345, '<p>Такий спосіб є трішки клопітким, проте ягоди збережуть вітаміни</p>\r\n\r\n<p>Зазвичай полуничне варення готують за традиційним рецептом: засипають ягоди цукром та проварюють до готовності. Однак таке варення можна приготувати без варіння ягід. Такий спосіб є трішки клопітким, проте ягоди збережуть в собі якнайбільше вітамінів.</p>\r\n\r\n<p>У рецепті без варіння ягід, полуниця не кип&#39;ятиться&nbsp;і не вариться, а просто витримується в гарячому сиропі, тобто ягоди не піддаються прямій тепловій обробці. Таким чином,&nbsp;полуниця зберігає свій натуральний смак, щільність і форму, але стає трохи блідішою, так як віддає свій колір і аромат сиропу. Для приготування варення&nbsp;потрібно&nbsp;тричі проварити сироп, а решту часу йде на пасивне очікування. Мінімум зусиль &ndash; і варення готове!</p>\r\n\r\n<h3>Рецепт приготування варення без варки</h3>\r\n\r\n<p><strong>Варення &quot;Швидке&quot;</strong></p>\r\n\r\n<p>Це один з варіантів приготування швидкого десерту, на нього доведеться витратити мінімум вільного часу, але при цьому можна отримати прекрасний десерт. Варто зауважити, що для отримання необхідної консистенції, слід застосувати блендер, а зберігати готові&nbsp;ласощі слід в холодильнику.</p>\r\n\r\n<p><strong>Інгредієнти:</strong><br />\r\n&ndash; 520 грамів стиглої полуниці;<br />\r\n&ndash; 780 грамів цукрового піску.</p>\r\n\r\n<p><strong>Як приготувати полуничне варення без варки ягід:</strong></p>\r\n\r\n<p>1. Ягоди промийте кілька разів у воді, видаліть хвостики з полуниці і покладіть на чистий рушник для просушування.&nbsp;</p>\r\n\r\n<p>2. Полуницю поставте у глибоку миску, засипте половину ємності цукровим піском. Всі складові збийте блендером. Коли цукрові крупинки повністю розчиняться, додайте залишки цукрового піску і повторно збийте блендером до повного розчинення.&nbsp;</p>\r\n\r\n<p>3. Не обов&#39;язково&nbsp;збивати&nbsp;до повного розчинення цукру, навіть якщо частина крупинок залишилася, згодом цукор розчиниться.</p>\r\n\r\n<p>4. Заздалегідь простеліризуйте банки і кришки. До&nbsp;них перекладіть заготовлене варення. Щільно&nbsp;закрийте&nbsp;кришками і відправляйте&nbsp;в камеру холодильника.</p>\r\n\r\n<p>5. Таке варення може зберігати свою свіжість протягом трьох місяців, але тільки за умови, що ягоди були ретельно промиті перед приготуванням десерту.</p>\r\n\r\n<p><strong>Варення &quot;Шматочками&quot;</strong></p>\r\n\r\n<p>Десерт може зберігатися у холодильнику декілька місяців. Для цього рецепту не треба використовувати блендер, адже варення не буде пюреподібної консистенції.&nbsp;</p>\r\n\r\n<p><strong>Інгредієнти:</strong><br />\r\n&ndash; 1, 2 кілограмів спілі ягоди полуниці;<br />\r\n&ndash; 1,4 кілограмів&nbsp;цукрового піску.</p>\r\n\r\n<p><strong>Як приготувати полуничне варення без варки ягід:</strong></p>\r\n\r\n<p>1. Помийте ягоди полуниці та видаліть&nbsp;хвостики. Поставте полуницю на рушник, щоб вона висохла. Ягоди наріжте невеличкими шматочками.&nbsp;</p>\r\n\r\n<p>2. Плоди ягід ставте у глибоку каструлю шарами, пересипаючи цукровим піском. Залишки цукру засипте&nbsp;на верхній шар полуниці.&nbsp;</p>\r\n\r\n<p>3. Каструлю накрийте кришкою та залишіть на ніч в холодильнику. За ніч ягоди дадуть необхідну кількість соку.&nbsp;</p>\r\n\r\n<p>4. Отриману суміш перемішайте і ще раз залиште на годину в холодильнику. Тим часом простерелізуйте банки та кришки.&nbsp;</p>\r\n\r\n<p>5. Готовий рецепт переставте в банки і закрутіть кришкою. Після цього відправляйте в холодильник.</p>', 3, 'img-1203-50-.jpg', 345, NULL, '2019-06-05 03:06:03'),
(2, 'Деруни', '2', 345, '<p>Влітку найчастіше готують цей пиріг з полуницею і заварним кремом</p>\r\n\r\n<p>Незвичайний італійський пиріг під назвою &quot;кростата&quot; можна приготувати і в домашніх умовах за допомогою простих інгредієнтів. Тому встигніть потішити своїх рідних і друзів смакотою, поки ще на закінчився сезон полуниць.</p>\r\n\r\n<p>Традиційно в якості начинки для італійської кростати використовують свіжі сезонні фрукти. Влітку найчастіше готують цей пиріг з полуницею і заварним кремом.</p>\r\n\r\n<p><strong>Інгрідієнти</strong>:</p>\r\n\r\n<ul>\r\n	<li>борошно &ndash; 250 г;</li>\r\n	<li>яйце &ndash; 1 шт .;</li>\r\n	<li>м&#39;яке вершкове масло - 110 г;</li>\r\n	<li>цукор &ndash; 60 г;</li>\r\n	<li>ванільний екстракт &ndash; 1/2 ч.л.</li>\r\n</ul>\r\n\r\n<p><strong>Для заварного крему</strong>:</p>\r\n\r\n<ul>\r\n	<li>молоко &ndash; 130 мл;</li>\r\n	<li>борошно &ndash; 2 ст.л .;</li>\r\n	<li>яєчні жовтки &ndash; 2 шт .;</li>\r\n	<li>ванільний цукор &ndash; 4 пакетика;</li>\r\n	<li>мелена кориця &ndash; на кінчику ножа;</li>\r\n</ul>\r\n\r\n<p><strong>Для начинки</strong>:</p>\r\n\r\n<ul>\r\n	<li>свіжа полуниця &ndash; 500 г;</li>\r\n	<li>листочки м&#39;яти;</li>\r\n	<li>мигдальні пластівці &ndash; 50 г;</li>\r\n	<li>цукрова пудра &ndash; для прикраси.</li>\r\n</ul>\r\n\r\n<p><strong>Спосіб приготування пирога</strong>:</p>\r\n\r\n<p>Перемішайте розм&#39;якшене вершкове масло з цукром і дрібкою солі. Додайте в масло одне яйце і ванільний екстракт, збийте до однорідної консистенції. Додайте борошно невеликими частинами, замісіть тісто. Скачайте тісто в кулю, загорніть в харчову плівку і відправте в холодильник на годину, або в морозильну камеру на 15-20 хвилин.</p>\r\n\r\n<p>Підігрійте молоко, але не доводьте його до кипіння. Збийте жовтки з цукром, додайте борошно, корицю і злийте массу тонкою &quot;цівкою&quot; в тепле молоко. Розмішайте суміш до отримання однорідної маси, потім поверніть посудино з вмістом на вогонь. Доведіть до кипіння суміш, постійно помішуючи. Коли крем загусне, зніміть його з вогню і швидко охолодіть, опустивши посудину в ємність з холодною водою. Не припиняйте помішувати крем.</p>\r\n\r\n<p>Форму діаметром до 30 сантиметрів&nbsp;присипте борошном, рівномірно розподіліть по ньому тісто, формуючи високі бортики. Випікайте тісто в розігрітій духовці при температурі 150-160 градусів протягом 30 хвилин. Потім дістаньте основу пирога з духовки і дайте їй повністю охолонути. Рівномірно наповніть пиріг заварним кремом, розподіліть по ньому полуницю. Потім прикрасьте пиріг цукровою пудрою і листочками м&#39;яти.</p>\r\n\r\n<p>Подавати справжню італійську кростату прийнято холодною, тому постарайтеся приготувати свій полуничний пиріг хоча б за 1 годину до подачі до столу.</p>\r\n\r\n<p><strong>Смачного!</strong></p>', 5, '6437tigyuek.jpg', 345, NULL, '2019-06-05 03:06:58'),
(3, 'Млинці з м\'ясом', '3', 467, 'Напої', 2, '754787007675254.png', 345, NULL, NULL),
(4, 'Вінегрет овочевий', '4', 467, 'Напої', 3, 'Кошерная-еда.jpg', 345, NULL, NULL),
(5, 'Яєшня з помідорами та грибами', '1', 345, 'Напої', 3, 'img-1203-50-.jpg', 345, NULL, NULL),
(6, 'Деруни з сиром', '2', 345, 'Напої', 5, '6437tigyuek.jpg', 345, NULL, NULL),
(7, 'Млинці з м\'ясом', '3', 467, 'Напої', 2, '754787007675254.png', 345, NULL, NULL),
(8, 'Вінегрет овочевий', '4', 467, 'Напої', 3, 'Кошерная-еда.jpg', 345, NULL, NULL),
(9, 'Яєшня з помідорами та грибами', '1', 345, 'Напої', 3, 'img-1203-50-.jpg', 345, NULL, NULL),
(10, 'Деруни з сиром', '2', 345, 'Напої', 5, '6437tigyuek.jpg', 345, NULL, NULL),
(11, 'Млинці з м\'ясом', '3', 467, 'Напої', 2, '754787007675254.png', 345, NULL, NULL),
(12, 'Вінегрет овочевий', '4', 467, 'Напої', 3, 'Кошерная-еда.jpg', 345, NULL, NULL),
(13, 'Яєшня з помідорами та грибами', '1', 345, 'Напої', 3, 'img-1203-50-.jpg', 345, NULL, NULL),
(14, 'Деруни з сиром', '2', 345, 'Напої', 5, '6437tigyuek.jpg', 345, NULL, NULL),
(15, 'Млинці з м\'ясом', '3', 467, 'Напої', 2, '754787007675254.png', 345, NULL, NULL),
(16, 'Вінегрет овочевий', '4', 467, 'Напої', 3, 'Кошерная-еда.jpg', 345, NULL, NULL),
(17, 'Яєшня з помідорами та грибами', '1', 345, 'Напої', 3, 'img-1203-50-.jpg', 345, NULL, NULL),
(18, 'Деруни з сиром', '2', 345, 'Напої', 5, '6437tigyuek.jpg', 345, NULL, NULL),
(19, 'Млинці з м\'ясом', '3', 467, 'Напої', 2, '754787007675254.png', 345, NULL, NULL),
(20, 'Вінегрет овочевий', '4', 467, 'Напої', 3, 'Кошерная-еда.jpg', 345, NULL, NULL),
(21, 'Яєшня з помідорами та грибами', '1', 345, 'Напої', 3, 'img-1203-50-.jpg', 345, NULL, NULL),
(22, 'Деруни з сиром', '2', 345, 'Напої', 5, '6437tigyuek.jpg', 345, NULL, NULL),
(23, 'Млинці з м\'ясом', '3', 467, 'Напої', 2, '754787007675254.png', 345, NULL, NULL),
(24, 'Вінегрет овочевий', '4', 467, 'Напої', 3, 'Кошерная-еда.jpg', 345, NULL, NULL),
(25, 'Яєшня з помідорами та грибами', '1', 345, 'Напої', 3, 'img-1203-50-.jpg', 345, NULL, NULL),
(26, 'Деруни з сиром', '2', 345, 'Напої', 5, '6437tigyuek.jpg', 345, NULL, NULL),
(27, 'Млинці з м\'ясом', '3', 467, 'Напої', 2, '754787007675254.png', 345, NULL, NULL),
(28, 'Вінегрет овочевий', '4', 467, 'Напої', 3, 'Кошерная-еда.jpg', 345, NULL, NULL),
(29, 'Яєшня з помідорами та грибами', '1', 345, 'Напої', 3, 'img-1203-50-.jpg', 345, NULL, NULL),
(30, 'Деруни з сиром', '2', 345, 'Напої', 5, '6437tigyuek.jpg', 345, NULL, NULL),
(31, 'Млинці з м\'ясом', '3', 467, 'Напої', 2, '754787007675254.png', 345, NULL, NULL),
(32, 'Вінегрет овочевий', '4', 467, 'Напої', 3, 'Кошерная-еда.jpg', 345, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `ingredient_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `recipes`
--

INSERT INTO `recipes` (`id`, `product_id`, `ingredient_id`, `unit_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 3, '6.00', '2019-06-05 03:18:17', '2019-06-05 03:18:17'),
(2, 2, 2, 4, '2.00', '2019-06-05 05:18:54', '2019-06-05 05:18:54');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(3, 'admin'),
(1, 'cook'),
(2, 'waiter');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Відправлено на кухню', NULL, NULL),
(2, 'Готується', NULL, NULL),
(3, 'Готове', NULL, NULL),
(4, 'Отримано клієнтом', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `suppliers`
--

INSERT INTO `suppliers` (`id`, `name_supplier`, `status`, `city`, `address`, `tel`, `created_at`, `updated_at`) VALUES
(1, 'ПП \'\'Постачальник\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:08:09', '2019-06-05 03:08:09'),
(2, 'ПП \'\'Постачальник2\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:08:19', '2019-06-05 03:09:08'),
(3, 'ПП \'\'Постачальник3\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:08:27', '2019-06-05 03:09:17'),
(4, 'ПП \'\'Постачальник\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:08:43', '2019-06-05 03:08:43'),
(5, 'ПП \'\'Постачальник\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:08:49', '2019-06-05 03:08:49'),
(6, 'ПП \'\'Постачальник\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:08:51', '2019-06-05 03:08:51'),
(7, 'ПП \'\'Постачальник\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:08:53', '2019-06-05 03:08:53'),
(8, 'ПП \'\'Постачальник\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:08:55', '2019-06-05 03:08:55'),
(9, 'ПП \'\'Постачальник\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:08:58', '2019-06-05 03:08:58'),
(10, 'ПП \'\'Постачальник\'\'', 'активний', 'Житомир', 'вул. Київська 98', '380976785678', '2019-06-05 03:09:00', '2019-06-05 03:09:00');

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE `tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', '2019-06-05 03:14:14', '2019-06-05 03:14:14'),
(2, '2', '2019-06-05 03:14:17', '2019-06-05 03:14:17'),
(3, '3', '2019-06-05 03:14:21', '2019-06-05 03:14:21'),
(4, '4', '2019-06-05 03:14:24', '2019-06-05 03:14:24'),
(5, '5', '2019-06-05 03:14:26', '2019-06-05 03:14:26'),
(6, '6', '2019-06-05 03:14:29', '2019-06-05 03:14:29'),
(7, '7', '2019-06-05 03:14:32', '2019-06-05 03:14:32'),
(8, '8', '2019-06-05 03:14:34', '2019-06-05 03:14:34'),
(9, '9', '2019-06-05 03:14:37', '2019-06-05 03:14:37'),
(10, '10', '2019-06-05 03:14:40', '2019-06-05 03:14:40'),
(11, '11', '2019-06-05 03:14:42', '2019-06-05 03:14:42'),
(12, '12', '2019-06-05 03:14:45', '2019-06-05 03:14:45'),
(13, '13', '2019-06-05 03:14:48', '2019-06-05 03:14:48'),
(14, '14', '2019-06-05 03:14:51', '2019-06-05 03:14:51'),
(15, '15', '2019-06-05 03:14:54', '2019-06-05 03:14:54'),
(16, '16', '2019-06-05 03:14:56', '2019-06-05 03:14:56'),
(17, '17', '2019-06-05 03:14:59', '2019-06-05 03:14:59'),
(18, '18', '2019-06-05 03:15:02', '2019-06-05 03:15:02');

-- --------------------------------------------------------

--
-- Структура таблицы `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `code_unit` int(11) NOT NULL,
  `name_unit` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `units`
--

INSERT INTO `units` (`id`, `code_unit`, `name_unit`, `created_at`, `updated_at`) VALUES
(1, 1, 'кг', '2019-06-05 03:11:46', '2019-06-05 03:11:46'),
(2, 2, 'л', '2019-06-05 03:11:54', '2019-06-05 03:11:54'),
(3, 3, 'мл', '2019-06-05 03:11:59', '2019-06-05 03:11:59'),
(4, 4, 'гр', '2019-06-05 03:12:06', '2019-06-05 03:12:06'),
(5, 5, 'шт', '2019-06-05 03:12:20', '2019-06-05 03:12:20'),
(6, 9, 'стакани', '2019-06-05 03:12:30', '2019-06-05 03:12:30'),
(7, 10, 'пакетики', '2019-06-05 03:12:44', '2019-06-05 03:12:44'),
(8, 13, 'ст.л', '2019-06-05 03:13:04', '2019-06-05 03:13:04');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin.admin@gmail.com', NULL, '$2y$10$DeSy.t9aIDX2cyak9Zn4NeRct0z57WIg.q7IHL9Xky.4lJeuBDz7e', 3, 'default.png', NULL, NULL, NULL),
(2, 'Cook', 'cook.cook@gmail.com', NULL, '$2y$10$6hS5KqFo2nQDzkV2.ogZj.5GisEcpwGpCNCFJ56ckhHZ6tctMuquu', 1, 'default.png', NULL, NULL, NULL),
(3, 'Waiter', 'waiter.waiter@gmail.com', NULL, '$2y$10$ASLcGEX/OV0DY7W.Pjm1Q.mb2RuPzU149DcyvJ0Y/v9yxN3wcOMCS', 2, 'default.png', NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_supplier_id_foreign` (`supplier_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_table_id_foreign` (`table_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`);

--
-- Индексы таблицы `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_product_id_foreign` (`product_id`),
  ADD KEY `recipes_ingredient_id_foreign` (`ingredient_id`),
  ADD KEY `recipes_unit_id_foreign` (`unit_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statuses_name_unique` (`name`);

--
-- Индексы таблицы `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tables_name_unique` (`name`);

--
-- Индексы таблицы `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipes_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
