-- Tabla banda
CREATE TABLE `banda` (
  `id_banda` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Pais_origen` varchar(250) NOT NULL,
  `Genero` varchar(250) NOT NULL,
  `Imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `banda` (`id_banda`, `Nombre`, `Pais_origen`, `Genero`, `Imagen`) VALUES
(1, 'Soda Stereo', 'Argentina', 'Rock', 'https://media.ambito.com/p/8fae45575c46a99064c0e58d9ebf7695/adjuntos/239/imagenes/041/770/0041770468/soda-stereo-1984jpg.jpg'),
(2, 'Enanitos Verdes', 'Argentina', 'Rock', 'https://i.scdn.co/image/0a44319db623b112c3fddca7a1ef88b5756265cd'),
(3, 'Guns N\' Roses', 'Estados Unidos', 'Rock', 'https://diariopublicable.com/wp-content/uploads/2023/11/AROSES.jpg'),
(4, 'Pink Floyd', 'Reino Unido', 'Rock', 'https://indiehoy.com/wp-content/uploads/2025/06/pink-floyd.jpg');

-- Tabla concierto
CREATE TABLE `concierto` (
  `id_concierto` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Horario` time NOT NULL,
  `Lugar` varchar(250) NOT NULL,
  `Ciudad` varchar(250) NOT NULL,
  `id_banda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `concierto` (`id_concierto`, `Fecha`, `Horario`, `Lugar`, `Ciudad`, `id_banda`) VALUES
(1, '2026-02-04', '20:00:00', 'Estadio Monumental, River Plate.', 'Nuñez, Argentina', 1),
(2, '2025-12-12', '21:00:00', 'Movistar Arena', 'Villa Crespo, Argentina', 2);

-- Tabla usuario (sin cambios)
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` char(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuario` (`id_usuario`, `usuario`, `contraseña`) VALUES (NULL, 'webadmin', '$2y$10$xy0oRTZSrZSGn5A5t2c/dOQ0C5WpfQPwZvvKpvYn23i65JrRjgSuy');

-- PRIMARY KEYS y AUTO_INCREMENT
ALTER TABLE `banda`
  ADD PRIMARY KEY (`id_banda`);
ALTER TABLE `concierto`
  ADD PRIMARY KEY (`id_concierto`);
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);
  
ALTER TABLE `banda`
  MODIFY `id_banda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `concierto`
  MODIFY `id_concierto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

-- FOREIGN KEY
ALTER TABLE `concierto`
  ADD CONSTRAINT `concierto_ibfk_1` FOREIGN KEY (`id_banda`) REFERENCES `banda` (`id_banda`);

-- UNIQUE COMPUESTO para evitar duplicados exactos
ALTER TABLE `concierto`
  ADD CONSTRAINT `unique_concierto_evento` UNIQUE (`Fecha`, `Horario`, `id_banda`);

