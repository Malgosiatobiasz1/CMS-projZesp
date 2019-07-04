-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Lip 2019, 22:39
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `custom_cms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE `adresy` (
  `id_adres` int(3) NOT NULL,
  `miasto` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `miejscowosc` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `wojewodztwo` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `powiat` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `kod_pocztowy` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `ulica` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `nr_domu` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `nr_lokalu` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Komputery'),
(8, 'Smartphony'),
(9, 'Tablety');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `comment_content` text COLLATE utf8_polish_ci NOT NULL,
  `comment_status` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(11, 6, 'Malgosiatobiasz', 'malgosiatobiasz1@gmail.com', 'OK', 'unapproved', '2019-07-01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `egzemplarze`
--

CREATE TABLE `egzemplarze` (
  `id_egzemplarz` int(3) NOT NULL,
  `id_produkt` int(3) NOT NULL,
  `kod_prokuktu` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `cena_netto_zakupu` decimal(10,2) NOT NULL,
  `cena_brutto_zakupu` decimal(10,2) NOT NULL,
  `procent_vat_zakupu` int(11) NOT NULL,
  `data_zakupu` datetime NOT NULL,
  `czy_sprzedano` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faktury_sprzedazy`
--

CREATE TABLE `faktury_sprzedazy` (
  `id_faktura_sprzedazy` int(3) NOT NULL,
  `id__klient` int(3) NOT NULL,
  `nr__faktury_sprzedazy` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `data_sprzedazy` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `wartosc_netto` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `wartosc_brutto` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `wartosc_vat` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `nazwa_banku` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `forma_platnosci` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `rodzaj_dokumentu` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galeria_zdjec`
--

CREATE TABLE `galeria_zdjec` (
  `id_zdjecie` int(3) NOT NULL,
  `id_product` int(3) NOT NULL,
  `nazwa_jpg` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `data_dodania` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie_producenci`
--

CREATE TABLE `kategorie_producenci` (
  `id_kategorie_producenci` int(3) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `id_producent` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klient` int(3) NOT NULL,
  `id__adres` int(3) NOT NULL,
  `id__kontakt` int(3) NOT NULL,
  `login` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `md5_haslo` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `nazwa_firmy` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `regon_firmy` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `nip` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `rodzaj_klienta` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakty`
--

CREATE TABLE `kontakty` (
  `id_kontakt` int(3) NOT NULL,
  `nr_tel_1` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `nr_tel_2` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `fax` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `www` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `post_author` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `post_date` date NOT NULL,
  `post_image` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `post_content` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `post_tags` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(6, 2, 'Lorem ipsum', 'MT', '2019-07-01', 'Hearthstone Screenshot 01-23-17 22.20.27.png', '<p>test test</p>', '', 1, 'published'),
(7, 2, 'This is another post', 'MT', '2019-07-01', '', '<p>Lorem ipsum</p>', 'Lorem iopsum', 1, 'draft'),
(8, 2, 'Lorem', 'ipsum', '2019-07-01', '', '<p>Lorem</p>', 'draft', 0, 'draft'),
(9, 2, 'Test postu', 'Malgosia', '2019-07-01', 'frog.jpg', '<p><strong>Lorem iopsum</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '', 0, 'published');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pozycje_faktury_sprzedazy`
--

CREATE TABLE `pozycje_faktury_sprzedazy` (
  `id_pozycja_faktury_sprzedazy` int(3) NOT NULL,
  `id_faktura_sprzedazy` int(3) NOT NULL,
  `id_egemplarz` int(3) NOT NULL,
  `cena_netto_sprzedazy` decimal(10,2) NOT NULL,
  `cena_brutto_sprzedazy` decimal(10,2) NOT NULL,
  `procent_vat_sprzedazy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownik` int(3) NOT NULL,
  `id_adres` int(3) NOT NULL,
  `id_kontakt` int(3) NOT NULL,
  `login` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `uprawnienie` enum('') COLLATE utf8_polish_ci NOT NULL,
  `konto_aktywne` tinyint(1) NOT NULL,
  `data_zatrudnienia` datetime NOT NULL,
  `data_zwolnienia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE `producenci` (
  `id_producent` int(3) NOT NULL,
  `nazwa_producenta` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produkt` int(3) NOT NULL,
  `id_kategorie_producenci` int(3) NOT NULL,
  `nazwa_produktu` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `typ` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `wersja` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `fotografia` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `cena_netto_sprzedazy_aktualna` decimal(10,2) NOT NULL,
  `cena_brutto_sprzedazy_aktualna` decimal(10,2) NOT NULL,
  `producent_vat_sprzedazy_aktualna` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `user_first_name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `user_last_name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `user_image` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `user_role` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `randSalt` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'Malgosia', '1234', 'Malgorzata', 'Tobiasz', 'malgosiatobiasz1@gmail.com', '', 'admin', ''),
(2, 'Wiki', '1234', 'Wiktoria', 'Walo', 'wiktoriawalo@gmail.com', '', 'admin', ''),
(3, 'Jarek', '1234', 'Jaroslaw', 'Tusinski', '	jarektusinski@gmail.com', '', 'admin', ''),
(4, 'Malgosia', '123456', 'Malgosia', 'Tobiasz', 'malgosiatobiasz1@gmail.com', '', 'subscriber', ''),
(5, 'Wiktoria', '$1$ovJSylpY$aY0L01bkRDwNc.BNHoPH00', '', '', 'wiktoriawalo@gmail.com', '', 'subscriber', ''),
(6, 'Malgosia', '$1$p5D5aRd8$SVlSZHS3Sbt6tHMP7YvJP1', '', '', 'malgosiatobiasz1@gmail.com', '', 'subscriber', ''),
(7, 'Gosia', '123456', 'Gosia', 'Tobiasz', 'malgosiatobiasz1@gmail.com', '', 'admin', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(3) NOT NULL,
  `id_klient` int(3) NOT NULL,
  `data_zlozenia_zamowienia` datetime NOT NULL,
  `czy_przyjeto_zamowienie` tinyint(1) NOT NULL,
  `data_przyjecia_zamowienia` datetime NOT NULL,
  `zaplacono` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `data_wysylki` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `czy_zamowienie_zrealizowano` tinyint(1) NOT NULL,
  `data_realizacji_zamowienia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_produkty`
--

CREATE TABLE `zamowienia_produkty` (
  `id_zamowienie_produkty` int(3) NOT NULL,
  `id_zamowienia` int(3) NOT NULL,
  `id_produkt` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD PRIMARY KEY (`id_adres`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indeksy dla tabeli `egzemplarze`
--
ALTER TABLE `egzemplarze`
  ADD PRIMARY KEY (`id_egzemplarz`),
  ADD UNIQUE KEY `id_produkt` (`id_produkt`);

--
-- Indeksy dla tabeli `faktury_sprzedazy`
--
ALTER TABLE `faktury_sprzedazy`
  ADD PRIMARY KEY (`id_faktura_sprzedazy`),
  ADD UNIQUE KEY `id__klient` (`id__klient`);

--
-- Indeksy dla tabeli `galeria_zdjec`
--
ALTER TABLE `galeria_zdjec`
  ADD PRIMARY KEY (`id_zdjecie`),
  ADD UNIQUE KEY `id_product` (`id_product`);

--
-- Indeksy dla tabeli `kategorie_producenci`
--
ALTER TABLE `kategorie_producenci`
  ADD PRIMARY KEY (`id_kategorie_producenci`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `id_producent` (`id_producent`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klient`),
  ADD UNIQUE KEY `id_adres` (`id__adres`) USING BTREE,
  ADD UNIQUE KEY `id__kontakt` (`id__kontakt`);

--
-- Indeksy dla tabeli `kontakty`
--
ALTER TABLE `kontakty`
  ADD PRIMARY KEY (`id_kontakt`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indeksy dla tabeli `pozycje_faktury_sprzedazy`
--
ALTER TABLE `pozycje_faktury_sprzedazy`
  ADD PRIMARY KEY (`id_pozycja_faktury_sprzedazy`),
  ADD UNIQUE KEY `id_faktura_sprzedazy` (`id_faktura_sprzedazy`),
  ADD UNIQUE KEY `id_egemplarz` (`id_egemplarz`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownik`),
  ADD KEY `id_adres` (`id_adres`),
  ADD KEY `id_kontakt` (`id_kontakt`);

--
-- Indeksy dla tabeli `producenci`
--
ALTER TABLE `producenci`
  ADD PRIMARY KEY (`id_producent`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produkt`),
  ADD UNIQUE KEY `id_kategorie_producenci` (`id_kategorie_producenci`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD UNIQUE KEY `id_klient` (`id_klient`);

--
-- Indeksy dla tabeli `zamowienia_produkty`
--
ALTER TABLE `zamowienia_produkty`
  ADD PRIMARY KEY (`id_zamowienie_produkty`),
  ADD UNIQUE KEY `id_zamowienia` (`id_zamowienia`),
  ADD UNIQUE KEY `id_produkt` (`id_produkt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD CONSTRAINT `adresy_ibfk_1` FOREIGN KEY (`id_adres`) REFERENCES `klienci` (`id__adres`);

--
-- Ograniczenia dla tabeli `egzemplarze`
--
ALTER TABLE `egzemplarze`
  ADD CONSTRAINT `egzemplarze_ibfk_1` FOREIGN KEY (`id_produkt`) REFERENCES `produkty` (`id_produkt`),
  ADD CONSTRAINT `egzemplarze_ibfk_2` FOREIGN KEY (`id_egzemplarz`) REFERENCES `pozycje_faktury_sprzedazy` (`id_egemplarz`);

--
-- Ograniczenia dla tabeli `kategorie_producenci`
--
ALTER TABLE `kategorie_producenci`
  ADD CONSTRAINT `kategorie_producenci_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `kategorie_producenci_ibfk_2` FOREIGN KEY (`id_producent`) REFERENCES `producenci` (`id_producent`);

--
-- Ograniczenia dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD CONSTRAINT `klienci_ibfk_1` FOREIGN KEY (`id_klient`) REFERENCES `faktury_sprzedazy` (`id__klient`);

--
-- Ograniczenia dla tabeli `kontakty`
--
ALTER TABLE `kontakty`
  ADD CONSTRAINT `kontakty_ibfk_1` FOREIGN KEY (`id_kontakt`) REFERENCES `klienci` (`id__kontakt`);

--
-- Ograniczenia dla tabeli `pozycje_faktury_sprzedazy`
--
ALTER TABLE `pozycje_faktury_sprzedazy`
  ADD CONSTRAINT `pozycje_faktury_sprzedazy_ibfk_1` FOREIGN KEY (`id_faktura_sprzedazy`) REFERENCES `faktury_sprzedazy` (`id_faktura_sprzedazy`);

--
-- Ograniczenia dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD CONSTRAINT `pracownicy_ibfk_1` FOREIGN KEY (`id_adres`) REFERENCES `adresy` (`id_adres`),
  ADD CONSTRAINT `pracownicy_ibfk_2` FOREIGN KEY (`id_kontakt`) REFERENCES `kontakty` (`id_kontakt`);

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`id_kategorie_producenci`) REFERENCES `kategorie_producenci` (`id_kategorie_producenci`),
  ADD CONSTRAINT `produkty_ibfk_2` FOREIGN KEY (`id_produkt`) REFERENCES `galeria_zdjec` (`id_product`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia_produkty` (`id_zamowienia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
