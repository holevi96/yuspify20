var XmasGame = XmasGame || {};

XmasGame.game = new Phaser.Game(1280, 720, Phaser.WEBGL, "");

XmasGame.game.state.add("Boot", XmasGame.Boot);
XmasGame.game.state.add("Preload", XmasGame.Preload);
XmasGame.game.state.add("MainMenu", XmasGame.MainMenu);
XmasGame.game.state.add("Game", XmasGame.Game);
XmasGame.game.state.add("GameOver", XmasGame.GameOver);

XmasGame.game.state.start("Boot");
