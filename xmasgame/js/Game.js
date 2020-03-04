var XmasGame = XmasGame || {};

Phaser.Filter.Glow = function(game) {
  Phaser.Filter.call(this, game);
  this.fragmentSrc = [
      "precision lowp float;",
      "varying vec2 vTextureCoord;",
      "varying vec4 vColor;",
      "uniform sampler2D uSampler;",

      "void main() {",
          "vec4 sum = vec4(0);",
          "vec2 texcoord = vTextureCoord;",
          "for(int xx = -4; xx <= 4; xx++) {",
              "for(int yy = -3; yy <= 3; yy++) {",
                  "float dist = sqrt(float(xx*xx) + float(yy*yy));",
                  "float factor = 0.0;",
                  "if (dist == 0.0) {",
                      "factor = 2.0;",
                  "} else {",
                      "factor = 2.0/abs(float(dist));",
                  "}",
                  "sum += texture2D(uSampler, texcoord + vec2(xx, yy) * 0.002) * factor;",
              "}",
          "}",
          "gl_FragColor = sum * 0.025 + texture2D(uSampler, texcoord);",
      "}"
  ];
}

Phaser.Filter.Glow.prototype = Object.create(Phaser.Filter.prototype);
Phaser.Filter.Glow.prototype.constructor = Phaser.Filter.Glow;

XmasGame.Game = function() {};

function shuffle(array) {
    let counter = array.length;
    while (counter > 0) {
        let index = Math.floor(Math.random() * counter);
        counter--;
        let temp = array[counter];
        array[counter] = array[index];
        array[index] = temp;
    }
    return array;
}

XmasGame.Game.prototype = {
  preload: function() {
    this.game.time.advancedTiming = true;
  },

  create: function() {
    this.game.world.setBounds(0, 0, 3600, this.game.height);
    this.background = this.add.tileSprite(0, 0, 3600, 750, "background");
    this.player = this.game.add.sprite(0, this.game.height - 500, "sleigh");
    this.recobox = this.game.add.sprite(0, 0, "recobox");
    this.recobox.fixedToCamera = true;
    this.generateHouses();
    this.game.world.bringToTop(this.houses);
    this.game.world.bringToTop(this.recobox);
    this.game.physics.enable(this.background);
    this.game.physics.enable(this.player);
    this.player.body.velocity.x = 300;
    this.background.body.immovable = true;
    this.score = 0;
    this.wraps = 0;
    this.lives = 5;
    this.fails = 0;
    this.gotInput = false;
    this.wrapping = true;
    this.stopped = false;
    this.clouds = [];
    let indicator_style = {font: "16px Arial", fill: "#F000F0"};
    let score_indicator = this.game.add.text(500, 32, "Score:", indicator_style);
    let life_indicator = this.game.add.text(500, 87, "Lives", indicator_style);
    // score_indicator.fixedToCamera = true;
    this.recobox.addChild(score_indicator);
    // life_indicator.fixedToCamera = true;
    this.recobox.addChild(life_indicator);
    let counter_style = {font: "20px Arial", fill: "#00FF00"};
    this.scoreText = this.game.add.text(55, -1, "", counter_style);
    score_indicator.addChild(this.scoreText);
    this.livesText = this.game.add.text(55, -1, "", counter_style);
    life_indicator.addChild(this.livesText);
    this.refreshStats();
    vertical_offset = this.player.y + 50;
    this.gifts = ["gift_0", "gift_1", "gift_2", "gift_3", "gift_4", "gift_5", "gift_6", "gift_7"];
    this.activeGifts = [];
    this.activeGiftIndexes = [];
    this.generateGifts();
    this.game.camera.follow(this.player);



    let fps_counter_style = {font: "45px Arial", fill: "#00FFFF"};
    this.fpsCounter = this.game.add.text(this.game.width - 80, 38, "--", fps_counter_style);
    this.fpsCounter.fixedToCamera = true;

  },

  destroyGifts: function() {
    this.activeGiftIndexes = [];
    for (gift of this.activeGifts) {
      gift.inputEnabled = false;
      gift.destroy();
    }
    this.activeGifts = [];
  },

  generateGifts: function() {
    this.gifts = shuffle(this.gifts);
    let prevRand = -1;
    let x = 30;
    let giftarr = this.gifts.slice(0, 4)
    for (gift of giftarr) {
      this.activeGifts.push(this.game.add.sprite(x, 22, gift));
      this.activeGiftIndexes.push(gift.substr(-1));
      x += 120;
    }
    for (gift of this.activeGifts) {
      this.game.physics.enable(gift);
      this.recobox.addChild(gift);
      gift.inputEnabled = true;
      gift.events.onInputDown.add(this.giftListener, this);
    }
  },

  update: function() {
    if (this.player.alive && !this.stopped){
      this.player.body.velocity.x = 300;

      for (this.house of this.houses.children) {
        if (Math.abs(this.house.x - Math.floor(this.player.x + 100)) < 3) {
          this.stopAtHouse();
        }
      }

      if (!this.wrapping && this.player.x < this.game.width) {
        this.wraps++;
        this.wrapping = true;
        this.houses.destroy();
        this.destroyGifts();
        this.generateGifts();
        this.generateHouses();
        this.game.world.bringToTop(this.house);
      }
      else if (this.player.x >= this.game.width) {
        this.wrapping = false;
      }
    }

    if (this.game.rnd.integerInRange(0, 192) == 3) {
      this.generateClouds();
    }

    this.refreshStats();
    this.game.world.wrap(this.player);
  },

  thoughtBubble: function() {
    let r = this.game.rnd.integerInRange(0, 3);
    let kids = ["kid_0", "kid_1", "kid_2", "kid_3"];
    this.thoughtbubble = this.game.add.sprite(this.house.x + this.house.width / 1.25, this.house.y - 200, kids[r]);
    this.currentGift = this.activeGifts[r].key.substr(-1);
  },

  giftListener: function(e) {
    console.log(e + " clicked!");
    if (this.waitingForInput) {
      this.getRecommendation(e.key.substr(-1));
      this.gotInput = true;
      this.waitingForInput = false;
    }
  },

  refreshStats: function() {
    this.scoreText.text = this.score;
    this.livesText.text = this.lives - this.fails;
  },

  gameOver: function() {
    this.game.state.start("GameOver");
  },

  generateClouds() {
    console.log(this.clouds.length);
    let clouds = ["cloud_0", "cloud_1", "cloud_2"];
    let playerx = this.player.x;
    let x = this.game.rnd.integerInRange(playerx - 200, playerx + 800);
    let cloud = this.game.add.sprite(x, 70, clouds[this.game.rnd.integerInRange(0, 2)]);
    let emitter = this.game.add.emitter(0, 40, 250);
    this.game.world.bringToTop(this.recobox);
    emitter.makeParticles("noise");
    emitter.width = 150;
    emitter.minParticleScale = 0.1;
    emitter.maxParticleScale = 0.5;
    emitter.setYSpeed(50, 125);
    emitter.setXSpeed(-5, 5);
    emitter.minRotation = 0;
    emitter.maxRotation = 0;
    emitter.start(false, 3200, 2, 0);
    cloud.anchor.setTo(0.5, 0.5);
    cloud.alpha = 0;
    this.game.add.tween(cloud).to( { alpha: 1 }, 6000, Phaser.Easing.CubicIn, true, 0, 1, true);
    this.game.physics.enable(cloud);
    cloud.body.velocity.x = (this.game.rnd.integerInRange(0, 1) == 0) ? 100 : -100;
    cloud.addChild(emitter);
    if (this.clouds.length > 5) {
      console.log("5 active cloud");
      this.clouds[0].destroy();
      this.clouds.push(cloud);
      this.clouds = this.clouds.splice(1);
    } else {
      this.clouds.push(cloud);
    }
  },

  generateHouses: function() {
    this.house_x = []
    this.houses = this.game.add.group();
    let house_bottoms = ["house_bottom_0", "house_bottom_1", "house_bottom_2", "house_bottom_lrg_0", "house_bottom_lrg_1", "house_bottom_lrg_2"];
    let house_tops = ["house_top_0", "house_top_1", "house_top_2", "house_top_lrg_0", "house_top_lrg_1", "house_top_lrg_2"];
    let prev_x = 0;
    for (i = 0; i < 4; i++) {
      let x = Math.floor(this.game.world.width / 5) + prev_x;
      let rndbottom = this.game.rnd.integerInRange(0, 5);
      let heightOffset = (rndbottom < 3) ? 100 : 150;
      let bottom = this.game.add.sprite(x, this.game.height - heightOffset, house_bottoms[rndbottom]);
      let rndtop = this.game.rnd.integerInRange(0, 2);
      let top = undefined;
      if (rndbottom < 3) {
        top = this.game.add.sprite(0, -130, house_tops[rndtop]);
      } else {
        top = this.game.add.sprite(0, -80, house_tops[rndtop + 3]);
      }
      bottom.addChild(top);
      this.houses.add(bottom);
      prev_x = x;
      this.house_x.push(x);
    }
  },

  stopAtHouse: function() {
    this.player.body.velocity.x = 0;
    this.stopped = true;
    this.thoughtBubble();
    this.glowGift();
    this.waitingForInput = true;
    let timerEvent = this.game.time.events.add(Phaser.Timer.SECOND * 1.5, this.waitForInput, this);
  },

  glowGift: function() {
    for (child of this.recobox.children) {
      if (typeof(child.key) == "string") {
        if (child.key.substr(-1) == this.currentGift) {
          child.filters = [ this.game.add.filter("Glow") ];
          this.filteredChild = child;
          break;
        }
      }
    }
  },

  waitForInput: function() {
    this.waitingForInput = false;
    if (!this.gotInput) {
      this.getRecommendation(100);
    }
    this.gotInput = false;
  },

  getRecommendation: function(e) {
    if (this.activeGiftIndexes.indexOf(e) != -1) {
      if (this.currentGift == e) {
        this.goodRecommendation();
      } else {
        this.badRecommendation();
      }
    } else {
      this.badRecommendation();
    }
    this.thoughtbubble.destroy();
    this.filteredChild.filters = null;
    this.stopped = false;
    this.currentGift = undefined;
  },

  goodRecommendation: function() {
    this.score++;
  },

  badRecommendation: function() {
    this.lives--;
    if (this.lives == 0) {
      this.gameOver();
    }
  },

  render: function() {
    this.fpsCounter.setText(this.game.time.fps);
    // this.fpsCounter = this.game.add.text(this.game.width - 80, 38, this.game.time.fps, counter_style);
    // console.log(this.game.fps);
  }
}
