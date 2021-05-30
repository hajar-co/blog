    create database blog;
    use blog;
    Create TABLE Articles(
    ID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    image text,
    title varchar(120),
    author varchar(11),
    datePub date,
    description text);

    create TABLE blogger(
    ID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(11),
    email text,
    password int(11)
    );


    insert into blogger(name,email,password)VALUES("hajar","hajar@gmail.com","123");


    -- to add foreign key (id blogger) to articles table.
    ALTER TABLE Articles
    Add constraint(fk-1)FOREIGN KEY (author) REFERENCES blogger(ID); 
    ==> --we can't do that coz author and ID they don't have the same type one varchar and other int

    INSERT INTO articles(`image`, `title`, `author`, `datePub`, `description`) 
    VALUES ("LOAD_FILE('C:/blog/images/dev.jpg')","7 tips to become a better web developer","Hajar",curent date,"The design of the Eiffel Tower is 
    attributed to Maurice Koechlin and Émile Nouguier, 
    two senior engineers working for the Compagnie des Établissements Eiffel. It was envisioned after discussion about a suitable centrepiece 
    for the proposed 1889 Exposition Universelle, a world's fair to celebrate the centennial of the French Revolution. Eiffel openly acknowledged that inspiration for a tower came from the Latting Observatorybuilt in New York City
     in 1853. In May 1884, working at home, Koechlin made a sketch of t…")

     https://im0-tub-com.yandex.net/i?id=d4756625248412b6a89dc4fb04440321&n=13