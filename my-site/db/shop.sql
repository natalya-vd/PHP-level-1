-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 10 2022 г., 14:30
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `feedback`, `id_product`) VALUES
(1, 'Полина', 'Но слезы лились ручьями, и вскоре вокруг нее образовалась большая лужа дюйма в четыре глубиной. Вода разлилась по полу и уже дошла до середины зала. Немного спустя вдалеке послышался топот маленьких ног. Алиса торопливо вытерла глаза и стала ждать. Это возвращался Белый Кролик. Одет он был парадно, в одной руке держал пару лайковых перчаток, а в другой - большой веер. На бегу он тихо бормотал:', 1),
(2, 'Кирилл', 'Нет, вы только подумайте! - говорила она. - Какой сегодня день странный! А вчера все шло, как обычно! Может это я изменилась за ночь? Дайте-ка вспомнить: сегодня утром, когда я встала, я это была или не я? Кажется, уже не совсем я! Но если это так, то кто же я в таком случае? Это так сложно...', 1),
(3, 'Егор', 'Во всяком случае, я не Ада! - сказала она решительно. - У нее волосы вьются, а у меня нет! И уж, конечно, я не Мейбл. Я столько всего знаю, а она совсем ничего! И вообще она это она, а я это я! Как все непонятно! А ну-ка проверю, помню я то, что знала, или нет. Значит так: четырежды пять - двенадцать, четырежды шесть - тринадцать, четырежды семь... Так я до двадцати никогда не дойду! Ну, ладно, таблица умножения - это неважно! Попробую географию! Лондон - столица Парижа, а Париж - столица Рима, а Рим... Нет, все не так, все неверно! Должно быть, я превратилась в Мейбл... Попробую прочитать « Как дорожит...»', 2),
(10, 'Екатерина', 'Руку Алиса при этом положила на макушку, чтобы чувствовать, что с ней происходит. Но, к величайшему ее удивлению, она не стала ни выше, ни ниже. Конечно, так всегда и бывает, когда ешь пирожки, но Алиса успела привыкнуть к тому, что вокруг происходит одно только удивительное; ей показалось скучно и глупо, что жизнь опять пошла по-обычному. Она откусила еще кусочек и вскоре съела весь пирожок', 2),
(12, 'Наталья', 'Чай очень вкусный)))', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int NOT NULL,
  `quantity_views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `size`, `quantity_views`) VALUES
(21, '01.jpg', 111456, 1),
(22, '02.jpg', 70076, 0),
(23, '03.jpg', 70215, 0),
(24, '04.jpg', 61733, 1),
(25, '05.jpg', 160617, 0),
(26, '06.jpg', 89871, 1),
(27, '07.jpg', 99418, 0),
(28, '08.jpg', 103775, 0),
(29, '09.jpg', 81022, 0),
(30, '10.jpg', 97127, 0),
(31, '11.jpg', 98579, 0),
(32, '12.jpg', 139286, 0),
(33, '13.jpg', 113016, 0),
(34, '14.jpg', 151814, 5),
(35, '15.jpg', 112488, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name_product`, `price`, `path`, `description`) VALUES
(1, 'Суши', 200, 'sushi.jpg', '- Надеюсь, они не забудут в полдник налить ей молочка... Ах, Дина, милая, как жаль, что тебя со мной нет. Правда, мышек в воздухе нет, но зато мошек хоть отбавляй! Интересно, едят ли кошки мошек?\r\nТут Алиса почувствовала, что глаза у нее слипаются. Она сонно бормотала:\r\n- Едят ли кошки мошек? Едят ли кошки мошек?\r\nИногда у нее получалось:\r\n- Едят ли мошки кошек?\r\nАлиса не знала ответа ни на первый, ни на второй вопрос, и потому ей было все равно, как их ни задать. Она чувствовала, что засыпает. Ей уже снилось, что она идет об руку с Диной и озабоченно спрашивает ее:\r\n- Признайся, Дина, ты когда-нибудь ела мошек?\r\nТут раздался страшный треск. Алиса упала на кучу валежника и сухих листьев.'),
(2, 'Роллы', 150, 'rolls.jpg', 'Видишь ли, она начиталась всяких прелестных историй о том, как дети сгорали живьем или попадали на съедение диким зверям, - и все эти неприятности происходили с ними потому, что они не желали соблюдать простейших правил, которым обучали их друзья: если слишком долго держать в руках раскаленную докрасна кочергу, в конце концов обожжешься; если поглубже полоснуть по пальцу ножом, из пальца обычно идет кровь; если разом осушить пузырек с пометкой «Яд!», рано или поздно почти наверняка почувствуешь недомогание. Последнее правило Алиса помнила твердо.\r\nОднако на этом пузырьке никаких пометок не было, и Алиса рискнула отпить из него немного. Напиток был очень приятен на вкус - он чем-то напоминал вишневый пирог с кремом, ананас, жареную индейку, сливочную помадку и горячие гренки с маслом. Алиса выпила его до конца.\r\n- Какое странное ощущение! - воскликнула Алиса. - Я, верно, складываюсь, как подзорная труба.\r\nИ не ошиблась - в ней сейчас было всего десять дюймов росту. Она подумала, что теперь легко пройдет сквозь дверцу в чудесный сад, и очень обрадовалась. Но сначала на всякий случай она немножко подождала - ей хотелось убедиться, что больше она не уменьшается. Это ее слегка тревожило.'),
(3, 'Чай', 180, 'tea.jpg', '- Если я и дальше буду так уменьшаться, - сказала она про себя, - я могу я вовсе исчезнуть. Сгорю как свечка! Интересно, какая я тогда буду?\r\nИ она постаралась представить себе, как выглядит пламя свечи после того, как свеча потухнет. Насколько ей помнилось, такого она никогда не видала.\r\nПодождав немного и убедившись, что больше ничего не происходит, она решила тотчас же выйти в сад. Бедняжка! Подойдя к дверце, она обнаружила, что забыла золотой ключик на столе, а вернувшись к столу, поняла, что ей теперь до него не дотянуться. Сквозь стекло она ясно видела снизу лежащий на столе ключик. Она попыталась взобраться на стол по стеклянной ножке, но ножка была очень скользкая. Устав от напрасных усилий, бедная Алиса села на пол и заплакала.\r\n- Ну, хватит! - строго приказала она себе немного спустя. - Слезами горю не поможешь. Советую тебе сию же минуту перестать!'),
(4, 'Кофе', 160, 'coffee.jpg', 'Она всегда давала себе хорошие советы, хоть следовала им нечасто. Порой же ругала себя так беспощадно, что глаза ее наполнялись слезами. А однажды она даже попыталась отшлепать себя по щекам за то, что схитрила, играя в одиночку партию в крокет. Эта глупышка очень любила притворяться двумя разными девочками сразу.\r\n- Но сейчас это при всем желании невозможно! - подумала бедная Алиса. - Меня и на одну-то едва-едва хватает!\r\nТут она увидела под столом маленькую стеклянную коробочку. Алиса открыла ее - внутри был пирожок, на котором коринками было красиво написано: «СЪЕШЬ МЕНЯ!»\r\n- Что ж, - сказала Алиса, - я так и сделаю. Если при этом я вырасту, я достану ключик, а если уменьшусь - пролезу под дверь. Мне бы только попасть в сад, а как - все равно!\r\nОна откусила от пирожка и с тревогой подумала:\r\n- Расту или уменьшаюсь? Расту или уменьшаюсь?'),
(5, 'Морепродукты', 800, 'seafood.jpg', ' Все страньше и страньше! - вскричала Алиса. От изумления она совсем забыла, как нужно говорить. - Я теперь раздвигаюсь, словно подзорная труба. Прощайте, ноги!\r\n(В эту минуту она как раз взглянула на ноги и увидела, как стремительно они уносятся вниз. Еще мгновение - и они скроются из виду.)\r\n- Бедные мои ножки! Кто же вас будет теперь обувать? Кто натянет на вас чулки и башмаки? Мне же до вас теперь, мои милые, не достать. Мы будем так далеки друг от друга, что мне будет совсем не до вас... Придется вам обходиться без меня.\r\nТут она призадумалась.\r\n- Все-таки надо быть с ними поласковее, - сказала она про себя. - А то еще возьмут и пойдут не в ту сторону. Ну, ладно! На рождество буду посылать им в подарок новые ботинки.\r\nИ она принялась строить планы.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
