
CREATE TABLE pelicula (
                id INT AUTO_INCREMENT primary key,
                nombre VARCHAR NOT NULL,

);


CREATE TABLE actor (
                id BIGINT primary key,
                nombre VARCHAR NOT NULL,
                apellido VARCHAR NOT NULL,

);

ALTER TABLE actor MODIFY COLUMN id BIGINT COMMENT 'numero de id ';


CREATE TABLE actor_movie (
                actor_id BIGINT NOT NULL,
                peli_id INT NOT NULL,
                PRIMARY KEY (actor_id, peli_id)
);

ALTER TABLE actor_movie MODIFY COLUMN actor_id BIGINT COMMENT 'numero de id ';


ALTER TABLE actor_movie ADD CONSTRAINT pelicula_actor_movie_fk
FOREIGN KEY (peli_id)
REFERENCES pelicula (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE actor_movie ADD CONSTRAINT actor_actor_movie_fk
FOREIGN KEY (actor_id)
REFERENCES actor (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
