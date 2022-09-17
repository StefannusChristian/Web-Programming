var view = {
    displayHit: function(location) {
        var cell = document.getElementById(location);
        cell.setAttribute("class", "hit");
    },
    displayMiss: function(location) {
        var cell = document.getElementById(location);
        cell.setAttribute("class", "miss");
    },
    displayUpdateSetPlayerScorePerbandingan: function() {
        var p1_skor = document.getElementById("skor_p1");
        var p2_skor = document.getElementById("skor_p2");
        var player_1_set_win = document.getElementById("player_1_win");
        var player_2_set_win = document.getElementById("player_2_win");
        var jumlah_kapal_yang_di_hit_p1 = document.getElementById("shipDestroyedp1");
        var jumlah_kapal_yang_di_hit_p2 = document.getElementById("shipDestroyedp2");
        p1_skor.innerHTML = turn.p1_score;
        p2_skor.innerHTML = turn.p2_score;
        player_1_set_win.innerHTML = turn.perbandingan[0];
        player_2_set_win.innerHTML = turn.perbandingan[1];
        jumlah_kapal_yang_di_hit_p1.innerHTML = turn.num_ships_destroy_p1;
        jumlah_kapal_yang_di_hit_p2.innerHTML = turn.num_ships_destroy_p2;
    },
    displaySetWinner: function() {
        var pemenang_set = turn.set_winner;
        var setke = parseInt(turn.set_ke);
        var pemenang_set_ke = document.getElementById("pemenang_set_ke");
        if (pemenang_set == 0) {
            document.getElementById("setWinner").innerHTML = "Player 1"
            pemenang_set_ke.innerHTML = "Pemenang Set " + (setke);
        } else {
            document.getElementById("setWinner").innerHTML = "Player 2"
            pemenang_set_ke.innerHTML = "Pemenang Set " + (setke);
        }

    },
    displayWinner: function() {
        var pemenang = turn.final_winner;
        if (pemenang == 0) {
            document.getElementById("pemenang_akhir").innerHTML = "Player 1";
        } else {
            document.getElementById("pemenang_akhir").innerHTML = "Player 2";
        }
    }
};

var model = {
    boardSize: 0,
    numShips: 0,
    shipLength: 0,
    shipsSunk: 0,
    ships: [],
    numSets: 0,
    fire: function(guess) {
        for (var i = 0; i < this.numShips; i++) {
            var ship = this.ships[i];
            locations = ship.locations;
            var index = locations.indexOf(guess);
            //  Kalau Index >=0 artinya dia Hit karena artinya tebakan dia ada di array locations dari ship itu
            if (index >= 0) {
                ship.hits[index] = "hit";
                view.displayHit(guess);
                if (this.boardSize > 5) {
                    // Untuk Ukuran Board 7 - 13
                    document.getElementById("alert_message_area").innerHTML = "TEPAT SASARAN!";
                    document.getElementById("alert_message_area").style.color = '#05A8AA';
                    if (this.isSunk(ship)) {
                        document.getElementById("alert_message_area").innerHTML = "KAPAL TENGGELAM!";
                        document.getElementById("alert_message_area").style.color = '#05A8AA';
                        this.shipsSunk++;
                        if (turn.who_tern == 0) {
                            // varian Kapal (1x1) Skor per kapal = 30
                            if (this.boardSize == 7 || this.boardSize == 9) {
                                turn.num_ships_destroy_p1++;
                                turn.p1_score += 20;
                            } else {
                                turn.num_ships_destroy_p1++;
                                turn.p1_score += 10;
                            }
                        } else {
                            // varian Kapal (1x3) Skor per kapal = 10
                            if (this.boardSize == 7 || this.boardSize == 9) {
                                turn.p2_score += 20;
                                turn.num_ships_destroy_p2++;
                            } else {
                                turn.num_ships_destroy_p2++;
                                turn.p2_score += 10;
                            }
                        }
                    }
                } else {
                    // Untuk Ukuran Board Khusus 5
                    document.getElementById("alert_message_area").innerHTML = "KAPAL TENGGELAM!";
                    document.getElementById("alert_message_area").style.color = '#05A8AA';
                    this.shipsSunk++;
                    if (turn.who_tern == 0) {
                        turn.num_ships_destroy_p1++;
                        turn.p1_score += 30;
                    } else {
                        turn.num_ships_destroy_p2++;
                        turn.p2_score += 30;
                    }
                }
                document.getElementById("set_ke").innerHTML = (turn.set_ke + 1)
                if (turn.is_set_finished()) {
                    if (turn.p1_score > turn.p2_score) {
                        turn.perbandingan[0]++;
                        turn.set_winner = 0;
                    } else if (turn.p2_score > turn.p1_score) {
                        turn.perbandingan[1]++;
                        turn.set_winner = 1;
                    }
                    // Game Selesai
                    // Player 1 menang
                    if (turn.perbandingan[0] >= (this.numSets / 2)) {
                        turn.final_winner = 0;
                        document.getElementById("tombol_continue").disabled = true;
                        document.getElementById("giliran_siapa").innerHTML = "Player 1"
                        document.getElementById("fireButton1").disabled = true;
                        document.getElementById("fireButton2").disabled = true;
                        document.getElementById("guessInput2").disabled = true;
                        document.getElementById("guessInput2").disabled = true;
                        view.displayWinner();
                        // Player 2 menang
                    } else if (turn.perbandingan[1] >= (this.numSets / 2)) {
                        document.getElementById("tombol_continue").disabled = true;
                        turn.final_winner = 1;
                        document.getElementById("giliran_siapa").innerHTML = "Player 2"
                        document.getElementById("fireButton1").disabled = true;
                        document.getElementById("fireButton2").disabled = true;
                        document.getElementById("guessInput2").disabled = true;
                        document.getElementById("guessInput2").disabled = true;
                        view.displayWinner();
                    }
                    var dummy_1 = turn.perbandingan[0] >= (this.numSets / 2);
                    var dummy_2 = turn.perbandingan[1] >= (this.numSets / 2);
                    if ((this.numSets > 1) && !dummy_1 && !dummy_2) {
                        turn.set_ke++;
                        document.getElementById("tombol_continue").disabled = false;
                    }
                    document.getElementById("fireButton2").disabled = true;
                    document.getElementById("guessInput2").disabled = true;
                    document.getElementById("fireButton1").disabled = true;
                    document.getElementById("guessInput1").disabled = true;
                    if (((turn.final_winner) == 0) && this.numSets > 1) {
                        turn.who_tern = 0;
                    } else if (((turn.final_winner) == 1) && this.numSets > 1) {
                        turn.who_tern = 1;
                    }
                    view.displaySetWinner();
                    view.displayUpdateSetPlayerScorePerbandingan();
                }
                view.displayUpdateSetPlayerScorePerbandingan();
                return true;
            }
        }
        view.displayMiss(guess);
        document.getElementById("alert_message_area").innerHTML = "KAPAL GA NEMU!";
        document.getElementById("alert_message_area").style.color = '#BC412B';
        return false;
    },
    isSunk: function(ship) {
        for (var i = 0; i < this.shipLength; i++) {
            // Iterasi array ships dan lihat array dari hits. Kalau dia nemu ada satu saja elemen yang bukan hit, artinya kapal tersebut belum tenggelam
            if (ship.hits[i] != 'hit') {
                return false;
            }
        }
        return true;
    },
    generateShipsObject: function() {
        this.numShips = parseInt(document.getElementById("numShips").value);
        var jumlah_kapal_pilihan = document.getElementById("jumlah_kapal_pilihan");
        jumlah_kapal_pilihan.innerHTML = this.numShips;
        document.getElementById("NumShipsInputButton").disabled = true;
        document.getElementById("numShips").disabled = true;
        document.getElementById("numSetsInputButton").disabled = false;
        for (var i = 0; i < this.numShips; i++) {
            var the_ships = { locations: Array(this.shipLength).fill(0), hits: Array(this.shipLength).fill("") };
            this.ships.push(the_ships);
        }
        var locations;
        for (var i = 0; i < this.numShips; i++) {
            do {
                locations = this.generateShipLocation();
            } while (this.collision(locations));
            this.ships[i].locations = locations;
            console.log(this.ships[i].locations);
        }
    },
    // Method untuk mengenerate kapal
    generateShipLocation: function() {
        // Generate all the Ship Possibilites
        var all_possibilities = this.generate_all_position();
        var ship_locations = [];
        var direction = getRandomNumberBetween(0, 1)
        var alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"];
        var possible_alphabet = alphabet.slice(0, this.boardSize);
        // Generate Number From (0-1) --> 0 is Vertical Ship, 1 is Horizontal Ship
        if (this.boardSize == 5) {
            for (var i = 0; i < this.shipLength; i++) {
                var random_index = getRandomNumberBetween(0, all_possibilities.length - 1);
                var lokasi = all_possibilities[random_index];
                ship_locations.push(lokasi);
            }
            return ship_locations;
        }

        if (this.boardSize == 7 || this.boardSize == 9) {
            // Horizontal Ship
            if (direction == 1) {
                var random_col = getRandomNumberBetween(1, this.boardSize - 2);
                var random_index_alphabet = getRandomNumberBetween(0, possible_alphabet.length - 1);
                var random_letter = alphabet[random_index_alphabet];
            } else {
                // Vertical Ship
                var new_alphabet_index = getRandomNumberBetween(0, this.boardSize - this.shipLength);
                var random_col = getRandomNumberBetween(1, this.boardSize);
            }
            for (var i = 0; i < this.shipLength; i++) {
                if (direction == 1) {
                    var random_letter = alphabet[random_index_alphabet];
                    var lokasi = random_letter + "0" + (random_col + i);
                    ship_locations.push(lokasi);
                } else {
                    var new_letter = alphabet[new_alphabet_index + i];
                    var lokasi = new_letter + "0" + random_col;
                    ship_locations.push(lokasi);
                }
            }
            return ship_locations;
        }
        if (this.boardSize == 11 || this.boardSize == 13) {
            // Horizontal Ship
            if (direction == 1) {
                var random_col = getRandomNumberBetween(1, this.boardSize - 2);
                var random_index_alphabet = getRandomNumberBetween(0, possible_alphabet.length - 1);
                var random_letter = alphabet[random_index_alphabet];
            } else {
                // Vertical Ship
                var new_alphabet_index = getRandomNumberBetween(0, this.boardSize - this.shipLength);
                var random_col = getRandomNumberBetween(1, this.boardSize);
            }
            for (var i = 0; i < this.shipLength; i++) {
                if (direction == 1) {
                    var lokasi = random_letter + "0" + (random_col + i);
                    if (lokasi.length == 4) {
                        lokasi = this.reduce_lokasi_size(lokasi);
                    }
                    ship_locations.push(lokasi);
                } else {
                    var new_letter = alphabet[new_alphabet_index + i];
                    var lokasi = new_letter + "0" + random_col;
                    if (lokasi.length == 4) {
                        lokasi = this.reduce_lokasi_size(lokasi);
                    }
                    ship_locations.push(lokasi);
                }
            }
            return ship_locations;
        }

    },
    collision: function(locations) {
        for (var i = 0; i < this.numShips; i++) {
            var ship = model.ships[i];
            for (var j = 0; j < locations.length; j++) {
                if (ship.locations.indexOf(locations[j]) >= 0) {
                    return true;
                }
            }
        }
        return false;
    },
    reduce_lokasi_size: function(ship_location) {
        var indexPosition = 2;
        var final_location = ship_location.substring(0, indexPosition - 1) + ship_location.substring(indexPosition, ship_location.length);
        return final_location;
    },
    get_ukuran_papan_from_user: function() {
        var ukuranPapan = document.getElementById("ukuranPapanInput");
        var ok = document.getElementById("UkuranPapanInputButton");
        this.boardSize = parseInt(ukuranPapan.value);

        if ((this.boardSize >= 5 && this.boardSize <= 13) && (this.boardSize % 2 == 1)) {
            this.make_board();
            document.getElementById("alert_message_area").innerHTML = "NO ERRORS! ENJOY PLAYING!!!!"
            document.getElementById("alert_message_area").style.color = '#05A8AA';
            ukuranPapan.disabled = true;
            ok.disabled = true;
            document.getElementById("numShips").disabled = false;
            if (this.boardSize == 5) {
                this.shipLength = 1;
            } else if (this.boardSize == 7 || this.boardSize == 9) {
                this.shipLength = 2;
            } else if (this.boardSize == 11 || this.boardSize == 13) {
                this.shipLength = 3;
            }
            document.getElementById("NumShipsInputButton").disabled = false;
        } else {
            document.getElementById("alert_message_area").innerHTML = "BACA GENERAL INFORMATION!!!"
            document.getElementById("alert_message_area").style.color = '#BC412B';
            ukuranPapan.value = "";
        }
        var ukuran_papan = document.getElementById("ukuran_papan_pilihan");
        ukuran_papan.innerHTML = this.boardSize + " x " + this.boardSize;
    },
    make_board: function() {
        var papan = document.getElementById("papan");
        var alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"];
        var board = [];
        for (var i = 0; i < this.boardSize; i++) {
            var row = papan.insertRow(i);
            for (var j = 0; j < this.boardSize; j++) {
                var col = row.insertCell(j);
                if (j < 9) {
                    col.setAttribute("id", alphabet[i] + "" + "0" + (j + 1));
                    board.push(alphabet[i] + "" + "0" + (j + 1));
                } else {
                    col.setAttribute("id", alphabet[i] + (j + 1));
                    board.push(alphabet[i] + (j + 1));
                }
            }
            var col = row.insertCell(0);
            col.setAttribute("class", "axis");
            col.innerHTML = alphabet[i];
        }
        var row = papan.insertRow(this.boardSize);
        for (var j = 0; j < this.boardSize; j++) {
            var col = row.insertCell(j);
            col.setAttribute("class", "axis");
            var string = "0" + "" + (j + 1);
            if (string.length == 3) {
                string = this.reduce_string_size(string);
            }
            col.innerHTML = string;
        }
        var col = row.insertCell(0);
        col.setAttribute("class", "axis");
    },
    reduce_string_size: function(string) {
        var indexPosition = 1;
        var final_string = string.substring(0, indexPosition - 1) + string.substring(indexPosition, string.length);
        return final_string;
    },
    generate_all_position: function() {
        var alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"];
        var board = [];
        for (var i = 0; i < this.boardSize; i++) {
            for (var j = 0; j < this.boardSize; j++) {
                if (j < 9) {
                    board.push(alphabet[i] + "" + "0" + (j + 1));
                } else {
                    board.push(alphabet[i] + (j + 1));
                }

            }
        }
        return board;
    },
    makeSets: function() {
        var set_input_from_user = document.getElementById("numSets");
        var jmlh_set = set_input_from_user.value;
        var ok = document.getElementById("numSetsInputButton");
        ok.disabled = true;
        document.getElementById("numSets").disabled = true;
        this.numSets = jmlh_set;
        var tombol_fire_1 = document.getElementById("fireButton1");
        var jumlah_set_pilihan = document.getElementById("jumlah_set_pilihan");
        jumlah_set_pilihan.innerHTML = this.numSets;
        var tombol_fire_2 = document.getElementById("fireButton2");
        var set = document.getElementById("set_ke");
        set.innerHTML = turn.set_ke;
        if ((turn.set_ke) == 1) {
            this.generateRandomTurnForFirstSet();
        }
        var kotak_input_p1 = document.getElementById("guessInput1");
        var kotak_input_p2 = document.getElementById("guessInput2");

        // Giliran Player 1
        if (turn.who_tern == 0) {
            document.getElementById("giliran_siapa").innerHTML = "Player 1"
            tombol_fire_1.disabled = false;
            tombol_fire_2.disabled = true;
            kotak_input_p1.disabled = false;
            kotak_input_p2.disabled = true;
        } else {
            document.getElementById("giliran_siapa").innerHTML = "Player 2"
            tombol_fire_1.disabled = true;
            tombol_fire_2.disabled = false;
            kotak_input_p1.disabled = true;
            kotak_input_p2.disabled = false;
        }
    },
    resetBoard: function() {
        var table = document.getElementById("papan");
        for (var i = 0; i <= this.boardSize; i++) {
            table.deleteRow(0);
        }
        this.make_board();
    },
    resetScoreBoard: function() {
        turn.p1_score = 0;
        turn.p2_score = 0;
        turn.num_ships_destroy_p1 = 0;
        turn.num_ships_destroy_p2 = 0;
        if (turn.final_winner == 0) {
            turn.who_tern = 0;
        } else {
            turn.who_tern = 1;
        }
        document.getElementById("set_ke").innerHTML = (turn.set_ke + 1);
        document.getElementById("giliran_siapa").innerHTML = turn.who_tern;
        document.getElementById("skor_p1").innerHTML = turn.p1_score;
        document.getElementById("skor_p2").innerHTML = turn.p2_score;
        document.getElementById("shipDestroyedp1").innerHTML = turn.num_ships_destroy_p1;
        document.getElementById("shipDestroyedp2").innerHTML = turn.num_ships_destroy_p2;
        document.getElementById("setWinner").innerHTML = "-";
    },
    generateNewShipLocations: function() {
        this.ships = [];
        this.generateShipsObject();
    },
    enable_all_button_and_input: function() {
        document.getElementById("NumShipsInputButton").disabled = false;
        document.getElementById("numSetsInputButton").disabled = false;
        document.getElementById("ukuranPapanInput").disabled = false;
        document.getElementById("UkuranPapanInputButton").disabled = false;
        document.getElementById("numShips").disabled = false;
        document.getElementById("numSets").disabled = false;
    },
    generateRandomFirstTurn: function() {
        var random_turn = getRandomNumberBetween(0, 1);
        if (random_turn == 0) {
            turn.who_tern = 0;
        } else {
            turn.who_tern = 1;
        }
    },
    generateRandomTurnForFirstSet: function() {
        var random_turn = getRandomNumberBetween(0, 1);
        if (random_turn == 0) {
            turn.who_tern = 0;
        } else {
            turn.who_tern = 1;
        }
    }
}

var controller = {
    guesses: 0,
    processGuess: function(guess) {
        var location = checkGuess(guess);
        if (location) {
            this.guesses++;
            var hit = model.fire(location);
            // All the ships has been destroyed
            if (hit && model.shipsSunk === model.numShips) {
                document.getElementById("alert_message_area").innerHTML = "GAME OVER! Total Guesses: " + this.guesses;
                document.getElementById("alert_message_area").style.color = '#05A8AA';
            }
        }
    },
    click_continue_button: function() {
        document.getElementById("tombol_continue").disabled = true;
        document.getElementById("numSetsInputButton").disabled = true;
        model.resetBoard();
        model.generateNewShipLocations();
        // view.displayUpdateSetPlayerScorePerbandingan();
        model.resetScoreBoard();
        if (turn.set_winner == 0) {
            turn.who_tern = 0;
            document.getElementById("guessInput1").disabled = false;
            document.getElementById("fireButton1").disabled = false;
            document.getElementById("fireButton2").disabled = true;
            document.getElementById("guessInput2").disabled = true;
            document.getElementById("giliran_siapa").innerHTML = "Player 1";
        } else {
            turn.who_tern = 1;
            document.getElementById("guessInput1").disabled = true;
            document.getElementById("fireButton1").disabled = true;
            document.getElementById("fireButton2").disabled = false;
            document.getElementById("guessInput2").disabled = false;
            document.getElementById("giliran_siapa").innerHTML = "Player 2";
        }
    },
}

var turn = {
    // Simpan Score Player 1 dan 2 Setiap Set
    p1_score: 0,
    p2_score: 0,

    // Simpan Jumlah Kapal yang telah dihancurkan Player 1 dan 2 Setiap Set
    num_ships_destroy_p1: 0,
    num_ships_destroy_p2: 0,

    // Buat Perbandingan Skor Player 1 - Player 2
    perbandingan: [0, 0],

    // 0 --> p1, 1--> p2
    who_tern: 0,
    set_ke: 0,
    set_winner: 0,
    final_winner: 0,
    is_set_finished: function() {
        var max_score = model.numShips * ((4 - model.shipLength) * 10);
        var is_finished = false;
        if (this.p1_score >= (0.5 * max_score) || this.p2_score >= (0.5 * max_score)) {
            is_finished = true;
        }
        return is_finished;
    }
}

function checkGuess(guess) {
    var alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"];
    if (guess === null || guess.length !== 3) {
        document.getElementById("alert_message_area").innerHTML = "INVALID INPUT!"
        document.getElementById("alert_message_area").style.color = '#BC412B';
    } else {
        huruf_pertama = guess.charAt(0);
        var row = alphabet.indexOf(huruf_pertama);
        var col = guess.slice(1, 3);
        if (isNaN(row) || isNaN(col)) {
            document.getElementById("alert_message_area").innerHTML = "That Isn't on the Board!!";
            document.getElementById("alert_message_area").style.color = '#BC412B';
        } else if (row < 0 || row > model.boardSize || col <= 0 || col > model.boardSize) {
            document.getElementById("alert_message_area").innerHTML = "That's Off The Board!";
            document.getElementById("alert_message_area").style.color = '#BC412B';
        } else {
            return guess;
        }
    }
    return null;
}

function getRandomNumberBetween(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function handleFireButton1() {
    var guessInput = document.getElementById("guessInput1");
    var guess = guessInput.value.toUpperCase();

    controller.processGuess(guess);
    // Check for valid input
    if (checkGuess(guess) != null) {
        document.getElementById("fireButton1").disabled = true;
        document.getElementById("guessInput1").disabled = true;
        document.getElementById("fireButton2").disabled = false;
        document.getElementById("guessInput2").disabled = false;
        turn.who_tern = 1;
        document.getElementById("giliran_siapa").innerHTML = "Player 2"
    }
    guessInput.value = "";
}

function handleFireButton2() {
    var guessInput = document.getElementById("guessInput2");
    var guess = guessInput.value.toUpperCase();

    controller.processGuess(guess);

    // Check for valid input
    if (checkGuess(guess) != null) {
        document.getElementById("fireButton1").disabled = false;
        document.getElementById("guessInput1").disabled = false;
        document.getElementById("fireButton2").disabled = true;
        document.getElementById("guessInput2").disabled = true;
        document.getElementById("giliran_siapa").innerHTML = "Player 1"
        turn.who_tern = 0;
    }
    guessInput.value = "";
}

function handleKeyPress1(e) {
    var fireButton1 = document.getElementById("fireButton1");
    e = e || window.event;
    if (e.keyCode == 13) {
        fireButton1.click();
        return false;
    }
}

function handleKeyPress2(e) {
    var fireButton2 = document.getElementById("fireButton2");
    e = e || window.event;
    if (e.keyCode == 13) {
        fireButton2.click();
        return false;
    }
}

window.onload = init;

function init() {
    var fireButton1 = document.getElementById("fireButton1");
    fireButton1.onclick = handleFireButton1;
    var guessInput1 = document.getElementById("guessInput1");
    guessInput1.onkeypress = handleKeyPress1;
    var fireButton2 = document.getElementById("fireButton2");
    fireButton2.onclick = handleFireButton2;
    var guessInput2 = document.getElementById("guessInput2");
    guessInput2.onkeypress = handleKeyPress2;
    guessInput1.disabled = true;
    guessInput2.disabled = true;
}