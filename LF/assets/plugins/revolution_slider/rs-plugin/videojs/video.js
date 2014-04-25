/*! Video.js v4.0.3 Copyright 2013 Brightcove, Inc. https://github.com/videojs/video.js/blob/master/LICENSE */
(function () {
    var b = void 0, f = !0, h = null, l = !1;

    function m() {
        return function () {
        }
    }

    function p(a) {
        return function () {
            return this[a]
        }
    }

    function r(a) {
        return function () {
            return a
        }
    }

    var t;
    document.createElement("video");
    document.createElement("audio");
    function u(a, c, d) {
        if ("string" === typeof a) {
            0 === a.indexOf("#") && (a = a.slice(1));
            if (u.La[a])return u.La[a];
            a = u.r(a)
        }
        if (!a || !a.nodeName)throw new TypeError("The element or ID supplied is not valid. (videojs)");
        return a.player || new u.ea(a, c, d)
    }

    var v = u;
    window.xd = window.yd = u;
    u.Ob = "4.0";
    u.xc = "https:" == document.location.protocol ? "https://" : "http://";
    u.options = {techOrder: ["html5", "flash"], html5: {}, flash: {}, width: 300, height: 150, defaultVolume: 0, children: {mediaLoader: {}, posterImage: {}, textTrackDisplay: {}, loadingSpinner: {}, bigPlayButton: {}, controlBar: {}}};
    "GENERATED_CDN_VSN" !== u.Ob && (v.options.flash.swf = u.xc + "vjs.zencdn.net/" + u.Ob + "/video-js.swf");
    u.La = {};
    u.ka = u.CoreObject = m();
    u.ka.extend = function (a) {
        var c, d;
        a = a || {};
        c = a.init || a.g || this.prototype.init || this.prototype.g || m();
        d = function () {
            c.apply(this, arguments)
        };
        d.prototype = u.i.create(this.prototype);
        d.prototype.constructor = d;
        d.extend = u.ka.extend;
        d.create = u.ka.create;
        for (var e in a)a.hasOwnProperty(e) && (d.prototype[e] = a[e]);
        return d
    };
    u.ka.create = function () {
        var a = u.i.create(this.prototype);
        this.apply(a, arguments);
        return a
    };
    u.d = function (a, c, d) {
        var e = u.getData(a);
        e.z || (e.z = {});
        e.z[c] || (e.z[c] = []);
        d.u || (d.u = u.u++);
        e.z[c].push(d);
        e.S || (e.disabled = l, e.S = function (c) {
            if (!e.disabled) {
                c = u.fc(c);
                var d = e.z[c.type];
                if (d)for (var d = d.slice(0), k = 0, q = d.length; k < q && !c.lc(); k++)d[k].call(a, c)
            }
        });
        1 == e.z[c].length && (document.addEventListener ? a.addEventListener(c, e.S, l) : document.attachEvent && a.attachEvent("on" + c, e.S))
    };
    u.t = function (a, c, d) {
        if (u.kc(a)) {
            var e = u.getData(a);
            if (e.z)if (c) {
                var g = e.z[c];
                if (g) {
                    if (d) {
                        if (d.u)for (e = 0; e < g.length; e++)g[e].u === d.u && g.splice(e--, 1)
                    } else e.z[c] = [];
                    u.cc(a, c)
                }
            } else for (g in e.z)c = g, e.z[c] = [], u.cc(a, c)
        }
    };
    u.cc = function (a, c) {
        var d = u.getData(a);
        0 === d.z[c].length && (delete d.z[c], document.removeEventListener ? a.removeEventListener(c, d.S, l) : document.detachEvent && a.detachEvent("on" + c, d.S));
        u.zb(d.z) && (delete d.z, delete d.S, delete d.disabled);
        u.zb(d) && u.rc(a)
    };
    u.fc = function (a) {
        function c() {
            return f
        }

        function d() {
            return l
        }

        if (!a || !a.Ab) {
            var e = a || window.event;
            a = {};
            for (var g in e)"layerX" !== g && "layerY" !== g && (a[g] = e[g]);
            a.target || (a.target = a.srcElement || document);
            a.relatedTarget = a.fromElement === a.target ? a.toElement : a.fromElement;
            a.preventDefault = function () {
                e.preventDefault && e.preventDefault();
                a.returnValue = l;
                a.yb = c
            };
            a.yb = d;
            a.stopPropagation = function () {
                e.stopPropagation && e.stopPropagation();
                a.cancelBubble = f;
                a.Ab = c
            };
            a.Ab = d;
            a.stopImmediatePropagation = function () {
                e.stopImmediatePropagation &&
                e.stopImmediatePropagation();
                a.lc = c;
                a.stopPropagation()
            };
            a.lc = d;
            if (a.clientX != h) {
                g = document.documentElement;
                var j = document.body;
                a.pageX = a.clientX + (g && g.scrollLeft || j && j.scrollLeft || 0) - (g && g.clientLeft || j && j.clientLeft || 0);
                a.pageY = a.clientY + (g && g.scrollTop || j && j.scrollTop || 0) - (g && g.clientTop || j && j.clientTop || 0)
            }
            a.which = a.charCode || a.keyCode;
            a.button != h && (a.button = a.button & 1 ? 0 : a.button & 4 ? 1 : a.button & 2 ? 2 : 0)
        }
        return a
    };
    u.k = function (a, c) {
        var d = u.kc(a) ? u.getData(a) : {}, e = a.parentNode || a.ownerDocument;
        "string" === typeof c && (c = {type: c, target: a});
        c = u.fc(c);
        d.S && d.S.call(a, c);
        if (e && !c.Ab())u.k(e, c); else if (!e && !c.yb() && (d = u.getData(c.target), c.target[c.type])) {
            d.disabled = f;
            if ("function" === typeof c.target[c.type])c.target[c.type]();
            d.disabled = l
        }
        return!c.yb()
    };
    u.Q = function (a, c, d) {
        u.d(a, c, function () {
            u.t(a, c, arguments.callee);
            d.apply(this, arguments)
        })
    };
    var w = Object.prototype.hasOwnProperty;
    u.e = function (a, c) {
        var d = document.createElement(a || "div"), e;
        for (e in c)w.call(c, e) && (-1 !== e.indexOf("aria-") || "role" == e ? d.setAttribute(e, c[e]) : d[e] = c[e]);
        return d
    };
    u.Y = function (a) {
        return a.charAt(0).toUpperCase() + a.slice(1)
    };
    u.i = {};
    u.i.create = Object.create || function (a) {
        function c() {
        }

        c.prototype = a;
        return new c
    };
    u.i.qa = function (a, c, d) {
        for (var e in a)w.call(a, e) && c.call(d || this, e, a[e])
    };
    u.i.B = function (a, c) {
        if (!c)return a;
        for (var d in c)w.call(c, d) && (a[d] = c[d]);
        return a
    };
    u.i.ec = function (a, c) {
        var d, e, g;
        a = u.i.copy(a);
        for (d in c)w.call(c, d) && (e = a[d], g = c[d], a[d] = u.i.mc(e) && u.i.mc(g) ? u.i.ec(e, g) : c[d]);
        return a
    };
    u.i.copy = function (a) {
        return u.i.B({}, a)
    };
    u.i.mc = function (a) {
        return!!a && "object" === typeof a && "[object Object]" === a.toString() && a.constructor === Object
    };
    u.bind = function (a, c, d) {
        function e() {
            return c.apply(a, arguments)
        }

        c.u || (c.u = u.u++);
        e.u = d ? d + "_" + c.u : c.u;
        return e
    };
    u.oa = {};
    u.u = 1;
    u.expando = "vdata" + (new Date).getTime();
    u.getData = function (a) {
        var c = a[u.expando];
        c || (c = a[u.expando] = u.u++, u.oa[c] = {});
        return u.oa[c]
    };
    u.kc = function (a) {
        a = a[u.expando];
        return!(!a || u.zb(u.oa[a]))
    };
    u.rc = function (a) {
        var c = a[u.expando];
        if (c) {
            delete u.oa[c];
            try {
                delete a[u.expando]
            } catch (d) {
                a.removeAttribute ? a.removeAttribute(u.expando) : a[u.expando] = h
            }
        }
    };
    u.zb = function (a) {
        for (var c in a)if (a[c] !== h)return l;
        return f
    };
    u.p = function (a, c) {
        -1 == (" " + a.className + " ").indexOf(" " + c + " ") && (a.className = "" === a.className ? c : a.className + " " + c)
    };
    u.w = function (a, c) {
        if (-1 != a.className.indexOf(c)) {
            for (var d = a.className.split(" "), e = d.length - 1; 0 <= e; e--)d[e] === c && d.splice(e, 1);
            a.className = d.join(" ")
        }
    };
    u.gb = u.e("video");
    u.O = navigator.userAgent;
    u.Bc = !!u.O.match(/iPhone/i);
    u.Ac = !!u.O.match(/iPad/i);
    u.Cc = !!u.O.match(/iPod/i);
    u.Sb = u.Bc || u.Ac || u.Cc;
    var x = u, y;
    var z = u.O.match(/OS (\d+)_/i);
    y = z && z[1] ? z[1] : b;
    x.qd = y;
    u.Za = !!u.O.match(/Android.*AppleWebKit/i);
    var aa = u, A = u.O.match(/Android (\d+)\./i);
    aa.yc = A && A[1] ? A[1] : h;
    u.zc = function () {
        return!!u.O.match("Firefox")
    };
    u.vb = function (a) {
        var c = {};
        if (a && a.attributes && 0 < a.attributes.length)for (var d = a.attributes, e, g, j = d.length - 1; 0 <= j; j--) {
            e = d[j].name;
            g = d[j].value;
            if ("boolean" === typeof a[e] || -1 !== ",autoplay,controls,loop,muted,default,".indexOf("," + e + ","))g = g !== h ? f : l;
            c[e] = g
        }
        return c
    };
    u.td = function (a, c) {
        var d = "";
        document.defaultView && document.defaultView.getComputedStyle ? d = document.defaultView.getComputedStyle(a, "").getPropertyValue(c) : a.currentStyle && (d = a["client" + c.substr(0, 1).toUpperCase() + c.substr(1)] + "px");
        return d
    };
    u.xb = function (a, c) {
        c.firstChild ? c.insertBefore(a, c.firstChild) : c.appendChild(a)
    };
    u.Mb = {};
    u.r = function (a) {
        0 === a.indexOf("#") && (a = a.slice(1));
        return document.getElementById(a)
    };
    u.Ga = function (a, c) {
        c = c || a;
        var d = Math.floor(a % 60), e = Math.floor(a / 60 % 60), g = Math.floor(a / 3600), j = Math.floor(c / 60 % 60), k = Math.floor(c / 3600), g = 0 < g || 0 < k ? g + ":" : "";
        return g + (((g || 10 <= j) && 10 > e ? "0" + e : e) + ":") + (10 > d ? "0" + d : d)
    };
    u.Gc = function () {
        document.body.focus();
        document.onselectstart = r(l)
    };
    u.ld = function () {
        document.onselectstart = r(f)
    };
    u.trim = function (a) {
        return a.toString().replace(/^\s+/, "").replace(/\s+$/, "")
    };
    u.round = function (a, c) {
        c || (c = 0);
        return Math.round(a * Math.pow(10, c)) / Math.pow(10, c)
    };
    u.rb = function (a, c) {
        return{length: 1, start: function () {
            return a
        }, end: function () {
            return c
        }}
    };
    u.get = function (a, c, d) {
        var e = 0 === a.indexOf("file:") || 0 === window.location.href.indexOf("file:") && -1 === a.indexOf("http");
        "undefined" === typeof XMLHttpRequest && (window.XMLHttpRequest = function () {
            try {
                return new window.ActiveXObject("Msxml2.XMLHTTP.6.0")
            } catch (a) {
            }
            try {
                return new window.ActiveXObject("Msxml2.XMLHTTP.3.0")
            } catch (c) {
            }
            try {
                return new window.ActiveXObject("Msxml2.XMLHTTP")
            } catch (d) {
            }
            throw Error("This browser does not support XMLHttpRequest.");
        });
        var g = new XMLHttpRequest;
        try {
            g.open("GET", a)
        } catch (j) {
            d(j)
        }
        g.onreadystatechange =
            function () {
                4 === g.readyState && (200 === g.status || e && 0 === g.status ? c(g.responseText) : d && d())
            };
        try {
            g.send()
        } catch (k) {
            d && d(k)
        }
    };
    u.dd = function (a) {
        try {
            var c = window.localStorage || l;
            c && (c.volume = a)
        } catch (d) {
            22 == d.code || 1014 == d.code ? u.log("LocalStorage Full (VideoJS)", d) : 18 == d.code ? u.log("LocalStorage not allowed (VideoJS)", d) : u.log("LocalStorage Error (VideoJS)", d)
        }
    };
    u.ic = function (a) {
        a.match(/^https?:\/\//) || (a = u.e("div", {innerHTML: '<a href="' + a + '">x</a>'}).firstChild.href);
        return a
    };
    u.log = function () {
        u.log.history = u.log.history || [];
        u.log.history.push(arguments);
        window.console && window.console.log(Array.prototype.slice.call(arguments))
    };
    u.Oc = function (a) {
        var c, d;
        a.getBoundingClientRect && a.parentNode && (c = a.getBoundingClientRect());
        if (!c)return{left: 0, top: 0};
        a = document.documentElement;
        d = document.body;
        return{left: c.left + (window.pageXOffset || d.scrollLeft) - (a.clientLeft || d.clientLeft || 0), top: c.top + (window.pageYOffset || d.scrollTop) - (a.clientTop || d.clientTop || 0)}
    };
    u.c = u.ka.extend({g: function (a, c, d) {
        this.a = a;
        this.f = u.i.copy(this.f);
        c = this.options(c);
        this.L = c.id || (c.el && c.el.id ? c.el.id : a.id() + "_component_" + u.u++);
        this.Tc = c.name || h;
        this.b = c.el || this.e();
        this.D = [];
        this.pb = {};
        this.R = {};
        if ((a = this.f) && a.children) {
            var e = this;
            u.i.qa(a.children, function (a, c) {
                c !== l && !c.loadEvent && (e[a] = e.X(a, c))
            })
        }
        this.M(d)
    }});
    t = u.c.prototype;
    t.C = function () {
        if (this.D)for (var a = this.D.length - 1; 0 <= a; a--)this.D[a].C && this.D[a].C();
        this.R = this.pb = this.D = h;
        this.t();
        this.b.parentNode && this.b.parentNode.removeChild(this.b);
        u.rc(this.b);
        this.b = h
    };
    t.oc = p("a");
    t.options = function (a) {
        return a === b ? this.f : this.f = u.i.ec(this.f, a)
    };
    t.e = function (a, c) {
        return u.e(a, c)
    };
    t.r = p("b");
    t.id = p("L");
    t.name = p("Tc");
    t.children = p("D");
    t.X = function (a, c) {
        var d, e;
        "string" === typeof a ? (e = a, c = c || {}, d = c.componentClass || u.Y(e), c.name = e, d = new window.videojs[d](this.a || this, c)) : d = a;
        this.D.push(d);
        "function" === typeof d.id && (this.pb[d.id()] = d);
        (e = e || d.name && d.name()) && (this.R[e] = d);
        "function" === typeof d.el && d.el() && (this.pa || this.b).appendChild(d.el());
        return d
    };
    t.removeChild = function (a) {
        "string" === typeof a && (a = this.R[a]);
        if (a && this.D) {
            for (var c = l, d = this.D.length - 1; 0 <= d; d--)if (this.D[d] === a) {
                c = f;
                this.D.splice(d, 1);
                break
            }
            c && (this.pb[a.id] = h, this.R[a.name] = h, (c = a.r()) && c.parentNode === (this.pa || this.b) && (this.pa || this.b).removeChild(a.r()))
        }
    };
    t.P = r("");
    t.d = function (a, c) {
        u.d(this.b, a, u.bind(this, c));
        return this
    };
    t.t = function (a, c) {
        u.t(this.b, a, c);
        return this
    };
    t.Q = function (a, c) {
        u.Q(this.b, a, u.bind(this, c));
        return this
    };
    t.k = function (a, c) {
        u.k(this.b, a, c);
        return this
    };
    t.M = function (a) {
        a && (this.Z ? a.call(this) : (this.Oa === b && (this.Oa = []), this.Oa.push(a)));
        return this
    };
    t.Ra = function () {
        this.Z = f;
        var a = this.Oa;
        if (a && 0 < a.length) {
            for (var c = 0, d = a.length; c < d; c++)a[c].call(this);
            this.Oa = [];
            this.k("ready")
        }
    };
    t.p = function (a) {
        u.p(this.b, a);
        return this
    };
    t.w = function (a) {
        u.w(this.b, a);
        return this
    };
    t.show = function () {
        this.b.style.display = "block";
        return this
    };
    t.v = function () {
        this.b.style.display = "none";
        return this
    };
    t.ha = function () {
        this.w("vjs-fade-out");
        this.p("vjs-fade-in");
        return this
    };
    t.Fa = function () {
        this.w("vjs-fade-in");
        this.p("vjs-fade-out");
        return this
    };
    t.nc = function () {
        this.p("vjs-lock-showing");
        return this
    };
    t.Sa = function () {
        this.w("vjs-lock-showing");
        return this
    };
    t.disable = function () {
        this.v();
        this.show = m();
        this.ha = m()
    };
    t.width = function (a, c) {
        return B(this, "width", a, c)
    };
    t.height = function (a, c) {
        return B(this, "height", a, c)
    };
    t.Kc = function (a, c) {
        return this.width(a, f).height(c)
    };
    function B(a, c, d, e) {
        if (d !== b)return a.b.style[c] = -1 !== ("" + d).indexOf("%") || -1 !== ("" + d).indexOf("px") ? d : "auto" === d ? "" : d + "px", e || a.k("resize"), a;
        if (!a.b)return 0;
        d = a.b.style[c];
        e = d.indexOf("px");
        return-1 !== e ? parseInt(d.slice(0, e), 10) : parseInt(a.b["offset" + u.Y(c)], 10)
    }

    u.o = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        var d = l;
        this.d("touchstart", function () {
            d = f
        });
        this.d("touchmove", function () {
            d = l
        });
        var e = this;
        this.d("touchend", function (a) {
            d && e.n(a);
            a.preventDefault();
            a.stopPropagation()
        });
        this.d("click", this.n);
        this.d("focus", this.Ja);
        this.d("blur", this.Ia)
    }});
    t = u.o.prototype;
    t.e = function (a, c) {
        c = u.i.B({className: this.P(), innerHTML: '<div class="vjs-control-content"><span class="vjs-control-text">' + (this.na || "Need Text") + "</span></div>", ad: "button", "aria-live": "polite", tabIndex: 0}, c);
        return u.c.prototype.e.call(this, a, c)
    };
    t.P = function () {
        return"vjs-control " + u.c.prototype.P.call(this)
    };
    t.n = m();
    t.Ja = function () {
        u.d(document, "keyup", u.bind(this, this.$))
    };
    t.$ = function (a) {
        if (32 == a.which || 13 == a.which)a.preventDefault(), this.n()
    };
    t.Ia = function () {
        u.t(document, "keyup", u.bind(this, this.$))
    };
    u.J = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        this.Fc = this.R[this.f.barName];
        this.handle = this.R[this.f.handleName];
        a.d(this.pc, u.bind(this, this.update));
        this.d("mousedown", this.Ka);
        this.d("touchstart", this.Ka);
        this.d("focus", this.Ja);
        this.d("blur", this.Ia);
        this.d("click", this.n);
        this.a.d("controlsvisible", u.bind(this, this.update));
        a.M(u.bind(this, this.update));
        this.K = {}
    }});
    t = u.J.prototype;
    t.e = function (a, c) {
        c = c || {};
        c.className += " vjs-slider";
        c = u.i.B({ad: "slider", "aria-valuenow": 0, "aria-valuemin": 0, "aria-valuemax": 100, tabIndex: 0}, c);
        return u.c.prototype.e.call(this, a, c)
    };
    t.Ka = function (a) {
        a.preventDefault();
        u.Gc();
        this.K.move = u.bind(this, this.Fb);
        this.K.end = u.bind(this, this.Gb);
        u.d(document, "mousemove", this.K.move);
        u.d(document, "mouseup", this.K.end);
        u.d(document, "touchmove", this.K.move);
        u.d(document, "touchend", this.K.end);
        this.Fb(a)
    };
    t.Gb = function () {
        u.ld();
        u.t(document, "mousemove", this.K.move, l);
        u.t(document, "mouseup", this.K.end, l);
        u.t(document, "touchmove", this.K.move, l);
        u.t(document, "touchend", this.K.end, l);
        this.update()
    };
    t.update = function () {
        if (this.b) {
            var a, c = this.wb(), d = this.handle, e = this.Fc;
            isNaN(c) && (c = 0);
            a = c;
            if (d) {
                a = this.b.offsetWidth;
                var g = d.r().offsetWidth;
                a = g ? g / a : 0;
                c *= 1 - a;
                a = c + a / 2;
                d.r().style.left = u.round(100 * c, 2) + "%"
            }
            e.r().style.width = u.round(100 * a, 2) + "%"
        }
    };
    function C(a, c) {
        var d, e, g, j;
        d = a.b;
        e = u.Oc(d);
        j = g = d.offsetWidth;
        d = a.handle;
        if (a.f.md)return j = e.top, e = c.changedTouches ? c.changedTouches[0].pageY : c.pageY, d && (d = d.r().offsetHeight, j += d / 2, g -= d), Math.max(0, Math.min(1, (j - e + g) / g));
        g = e.left;
        e = c.changedTouches ? c.changedTouches[0].pageX : c.pageX;
        d && (d = d.r().offsetWidth, g += d / 2, j -= d);
        return Math.max(0, Math.min(1, (e - g) / j))
    }

    t.Ja = function () {
        u.d(document, "keyup", u.bind(this, this.$))
    };
    t.$ = function (a) {
        37 == a.which ? (a.preventDefault(), this.uc()) : 39 == a.which && (a.preventDefault(), this.vc())
    };
    t.Ia = function () {
        u.t(document, "keyup", u.bind(this, this.$))
    };
    t.n = function (a) {
        a.stopImmediatePropagation();
        a.preventDefault()
    };
    u.fa = u.c.extend();
    u.fa.prototype.defaultValue = 0;
    u.fa.prototype.e = function (a, c) {
        c = c || {};
        c.className += " vjs-slider-handle";
        c = u.i.B({innerHTML: '<span class="vjs-control-text">' + this.defaultValue + "</span>"}, c);
        return u.c.prototype.e.call(this, "div", c)
    };
    u.la = u.c.extend();
    function ba(a, c) {
        a.X(c);
        c.d("click", u.bind(a, function () {
            this.Sa()
        }))
    }

    u.la.prototype.e = function () {
        var a = this.options().Ic || "ul";
        this.pa = u.e(a, {className: "vjs-menu-content"});
        a = u.c.prototype.e.call(this, "div", {append: this.pa, className: "vjs-menu"});
        a.appendChild(this.pa);
        u.d(a, "click", function (a) {
            a.preventDefault();
            a.stopImmediatePropagation()
        });
        return a
    };
    u.I = u.o.extend({g: function (a, c) {
        u.o.call(this, a, c);
        this.selected(c.selected)
    }});
    u.I.prototype.e = function (a, c) {
        return u.o.prototype.e.call(this, "li", u.i.B({className: "vjs-menu-item", innerHTML: this.f.label}, c))
    };
    u.I.prototype.n = function () {
        this.selected(f)
    };
    u.I.prototype.selected = function (a) {
        a ? (this.p("vjs-selected"), this.b.setAttribute("aria-selected", f)) : (this.w("vjs-selected"), this.b.setAttribute("aria-selected", l))
    };
    u.ca = u.o.extend({g: function (a, c) {
        u.o.call(this, a, c);
        this.sa = this.Ea();
        this.X(this.sa);
        this.G && 0 === this.G.length && this.v();
        this.d("keyup", this.$);
        this.b.setAttribute("aria-haspopup", f);
        this.b.setAttribute("role", "button")
    }});
    t = u.ca.prototype;
    t.ma = l;
    t.Ea = function () {
        var a = new u.la(this.a);
        this.options().title && a.r().appendChild(u.e("li", {className: "vjs-menu-title", innerHTML: u.Y(this.A), jd: -1}));
        if (this.G = this.qb())for (var c = 0; c < this.G.length; c++)ba(a, this.G[c]);
        return a
    };
    t.qb = m();
    t.P = function () {
        return this.className + " vjs-menu-button " + u.o.prototype.P.call(this)
    };
    t.Ja = m();
    t.Ia = m();
    t.n = function () {
        this.Q("mouseout", u.bind(this, function () {
            this.sa.Sa();
            this.b.blur()
        }));
        this.ma ? D(this) : E(this)
    };
    t.$ = function (a) {
        a.preventDefault();
        32 == a.which || 13 == a.which ? this.ma ? D(this) : E(this) : 27 == a.which && this.ma && D(this)
    };
    function E(a) {
        a.ma = f;
        a.sa.nc();
        a.b.setAttribute("aria-pressed", f);
        a.G && 0 < a.G.length && a.G[0].r().focus()
    }

    function D(a) {
        a.ma = l;
        a.sa.Sa();
        a.b.setAttribute("aria-pressed", l)
    }

    u.ea = u.c.extend({g: function (a, c, d) {
        this.N = a;
        c = u.i.B(ca(a), c);
        this.s = {};
        this.qc = c.poster;
        this.Da = c.controls;
        c.customControlsOnMobile !== f && (u.Sb || u.Za) ? (a.controls = c.controls, this.Da = l) : a.controls = l;
        u.c.call(this, this, c, d);
        this.Q("play", function (a) {
            u.k(this.b, {type: "firstplay", target: this.b}) || (a.preventDefault(), a.stopPropagation(), a.stopImmediatePropagation())
        });
        this.d("ended", this.Vc);
        this.d("play", this.Ib);
        this.d("firstplay", this.Wc);
        this.d("pause", this.Hb);
        this.d("progress", this.Yc);
        this.d("durationchange",
            this.Uc);
        this.d("error", this.Eb);
        this.d("fullscreenchange", this.Xc);
        u.La[this.L] = this;
        c.plugins && u.i.qa(c.plugins, function (a, c) {
            this[a](c)
        }, this)
    }});
    t = u.ea.prototype;
    t.f = u.options;
    t.C = function () {
        u.La[this.L] = h;
        this.N && this.N.player && (this.N.player = h);
        this.b && this.b.player && (this.b.player = h);
        clearInterval(this.Na);
        this.ta();
        this.h && this.h.C();
        u.c.prototype.C.call(this)
    };
    function ca(a) {
        var c = {sources: [], tracks: []};
        u.i.B(c, u.vb(a));
        if (a.hasChildNodes())for (var d, e = a.childNodes, g = 0, j = e.length; g < j; g++)a = e[g], d = a.nodeName.toLowerCase(), "source" === d ? c.sources.push(u.vb(a)) : "track" === d && c.tracks.push(u.vb(a));
        return c
    }

    t.e = function () {
        var a = this.b = u.c.prototype.e.call(this, "div"), c = this.N;
        c.removeAttribute("width");
        c.removeAttribute("height");
        if (c.hasChildNodes())for (var d = c.childNodes.length, e = 0, g = c.childNodes; e < d; e++)("source" == g[0].nodeName.toLowerCase() || "track" == g[0].nodeName.toLowerCase()) && c.removeChild(g[0]);
        c.id = c.id || "vjs_video_" + u.u++;
        a.id = c.id;
        a.className = c.className;
        c.id += "_html5_api";
        c.className = "vjs-tech";
        c.player = a.player = this;
        this.p("vjs-paused");
        this.width(this.f.width, f);
        this.height(this.f.height,
            f);
        c.parentNode && c.parentNode.insertBefore(a, c);
        u.xb(c, a);
        return a
    };
    function F(a, c, d) {
        a.h ? (a.Z = l, a.h.C(), a.Cb && (a.Cb = l, clearInterval(a.Na)), a.Db && G(a), a.h = l) : "Html5" !== c && a.N && (a.b.removeChild(a.N), a.N.oc = h, a.N = h);
        a.ua = c;
        a.Z = l;
        var e = u.i.B({source: d, parentEl: a.b}, a.f[c.toLowerCase()]);
        d && (d.src == a.s.src && 0 < a.s.currentTime && (e.startTime = a.s.currentTime), a.s.src = d.src);
        a.h = new window.videojs[c](a, e);
        a.h.M(function () {
            this.a.Ra();
            if (!this.j.Kb) {
                var a = this.a;
                a.Cb = f;
                a.Na = setInterval(u.bind(a, function () {
                    this.s.lb < this.buffered().end(0) ? this.k("progress") : 1 == H(this) && (clearInterval(this.Na),
                        this.k("progress"))
                }), 500);
                a.h.Q("progress", function () {
                    this.j.Kb = f;
                    var a = this.a;
                    a.Cb = l;
                    clearInterval(a.Na)
                })
            }
            this.j.Nb || (a = this.a, a.Db = f, a.d("play", a.wc), a.d("pause", a.ta), a.h.Q("timeupdate", function () {
                this.j.Nb = f;
                G(this.a)
            }))
        })
    }

    function G(a) {
        a.Db = l;
        a.ta();
        a.t("play", a.wc);
        a.t("pause", a.ta)
    }

    t.wc = function () {
        this.dc && this.ta();
        this.dc = setInterval(u.bind(this, function () {
            this.k("timeupdate")
        }), 250)
    };
    t.ta = function () {
        clearInterval(this.dc)
    };
    t.Vc = function () {
        this.f.loop && (this.currentTime(0), this.play())
    };
    t.Ib = function () {
        u.w(this.b, "vjs-paused");
        u.p(this.b, "vjs-playing")
    };
    t.Wc = function () {
        this.f.starttime && this.currentTime(this.f.starttime)
    };
    t.Hb = function () {
        u.w(this.b, "vjs-playing");
        u.p(this.b, "vjs-paused")
    };
    t.Yc = function () {
        1 == H(this) && this.k("loadedalldata")
    };
    t.Uc = function () {
        this.duration(I(this, "duration"))
    };
    t.Eb = function (a) {
        u.log("Video Error", a)
    };
    t.Xc = function () {
        this.F ? this.p("vjs-fullscreen") : this.w("vjs-fullscreen")
    };
    function J(a, c, d) {
        if (a.h && a.h.Z)a.h.M(function () {
            this[c](d)
        }); else try {
            a.h[c](d)
        } catch (e) {
            throw u.log(e), e;
        }
    }

    function I(a, c) {
        if (a.h.Z)try {
            return a.h[c]()
        } catch (d) {
            throw a.h[c] === b ? u.log("Video.js: " + c + " method not defined for " + a.ua + " playback technology.", d) : "TypeError" == d.name ? (u.log("Video.js: " + c + " unavailable on " + a.ua + " playback technology element.", d), a.h.Z = l) : u.log(d), d;
        }
    }

    t.play = function () {
        J(this, "play");
        return this
    };
    t.pause = function () {
        J(this, "pause");
        return this
    };
    t.paused = function () {
        return I(this, "paused") === l ? l : f
    };
    t.currentTime = function (a) {
        return a !== b ? (this.s.vd = a, J(this, "setCurrentTime", a), this.Db && this.k("timeupdate"), this) : this.s.currentTime = I(this, "currentTime") || 0
    };
    t.duration = function (a) {
        return a !== b ? (this.s.duration = parseFloat(a), this) : this.s.duration
    };
    t.buffered = function () {
        var a = I(this, "buffered"), c = this.s.lb = this.s.lb || 0;
        a && (0 < a.length && a.end(0) !== c) && (c = a.end(0), this.s.lb = c);
        return u.rb(0, c)
    };
    function H(a) {
        return a.duration() ? a.buffered().end(0) / a.duration() : 0
    }

    t.volume = function (a) {
        if (a !== b)return a = Math.max(0, Math.min(1, parseFloat(a))), this.s.volume = a, J(this, "setVolume", a), u.dd(a), this;
        a = parseFloat(I(this, "volume"));
        return isNaN(a) ? 1 : a
    };
    t.muted = function (a) {
        return a !== b ? (J(this, "setMuted", a), this) : I(this, "muted") || l
    };
    t.Qa = function () {
        return I(this, "supportsFullScreen") || l
    };
    t.Pa = function () {
        var a = u.Mb.Pa;
        this.F = f;
        a ? (u.d(document, a.tb, u.bind(this, function (c) {
            this.F = document[a.F];
            this.F === l && u.t(document, a.tb, arguments.callee);
            this.k("fullscreenchange")
        })), this.b[a.sc]()) : this.h.Qa() ? J(this, "enterFullScreen") : (this.Qc = f, this.Lc = document.documentElement.style.overflow, u.d(document, "keydown", u.bind(this, this.gc)), document.documentElement.style.overflow = "hidden", u.p(document.body, "vjs-full-window"), this.k("enterFullWindow"), this.k("fullscreenchange"));
        return this
    };
    function K(a) {
        var c = u.Mb.Pa;
        a.F = l;
        if (c)document[c.nb](); else a.h.Qa() ? J(a, "exitFullScreen") : (L(a), a.k("fullscreenchange"))
    }

    t.gc = function (a) {
        27 === a.keyCode && (this.F === f ? K(this) : L(this))
    };
    function L(a) {
        a.Qc = l;
        u.t(document, "keydown", a.gc);
        document.documentElement.style.overflow = a.Lc;
        u.w(document.body, "vjs-full-window");
        a.k("exitFullWindow")
    }

    t.src = function (a) {
        if (a instanceof Array) {
            var c;
            a:{
                c = a;
                for (var d = 0, e = this.f.techOrder; d < e.length; d++) {
                    var g = u.Y(e[d]), j = window.videojs[g];
                    if (j.isSupported())for (var k = 0, q = c; k < q.length; k++) {
                        var n = q[k];
                        if (j.canPlaySource(n)) {
                            c = {source: n, h: g};
                            break a
                        }
                    }
                }
                c = l
            }
            c ? (a = c.source, c = c.h, c == this.ua ? this.src(a) : F(this, c, a)) : this.b.appendChild(u.e("p", {innerHTML: 'Sorry, no compatible source and playback technology were found for this video. Try using another browser like <a href="http://bit.ly/ccMUEC">Chrome</a> or download the latest <a href="http://adobe.ly/mwfN1">Adobe Flash Player</a>.'}))
        } else a instanceof
            Object ? window.videojs[this.ua].canPlaySource(a) ? this.src(a.src) : this.src([a]) : (this.s.src = a, this.Z ? (J(this, "src", a), "auto" == this.f.preload && this.load(), this.f.autoplay && this.play()) : this.M(function () {
            this.src(a)
        }));
        return this
    };
    t.load = function () {
        J(this, "load");
        return this
    };
    t.currentSrc = function () {
        return I(this, "currentSrc") || this.s.src || ""
    };
    t.Ma = function (a) {
        return a !== b ? (J(this, "setPreload", a), this.f.preload = a, this) : I(this, "preload")
    };
    t.autoplay = function (a) {
        return a !== b ? (J(this, "setAutoplay", a), this.f.autoplay = a, this) : I(this, "autoplay")
    };
    t.loop = function (a) {
        return a !== b ? (J(this, "setLoop", a), this.f.loop = a, this) : I(this, "loop")
    };
    t.poster = function (a) {
        a !== b && (this.qc = a);
        return this.qc
    };
    t.controls = function (a) {
        a !== b && this.Da !== a && (this.Da = !!a, this.k("controlschange"));
        return this.Da
    };
    t.error = function () {
        return I(this, "error")
    };
    var M, N, O;
    O = document.createElement("div");
    N = {};
    O.rd !== b ? (N.sc = "requestFullscreen", N.nb = "exitFullscreen", N.tb = "fullscreenchange", N.F = "fullScreen") : (document.mozCancelFullScreen ? (M = "moz", N.F = M + "FullScreen") : (M = "webkit", N.F = M + "IsFullScreen"), O[M + "RequestFullScreen"] && (N.sc = M + "RequestFullScreen", N.nb = M + "CancelFullScreen"), N.tb = M + "fullscreenchange");
    document[N.nb] && (u.Mb.Pa = N);
    u.ba = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        a.controls() || this.disable();
        a.Q("play", u.bind(this, function () {
            var a, c = u.bind(this, this.ha), g = u.bind(this, this.Fa);
            this.ha();
            "ontouchstart"in window || (this.a.d("mouseover", c), this.a.d("mouseout", g), this.a.d("pause", u.bind(this, this.nc)), this.a.d("play", u.bind(this, this.Sa)));
            a = l;
            this.a.d("touchstart", function () {
                a = f
            });
            this.a.d("touchmove", function () {
                a = l
            });
            this.a.d("touchend", u.bind(this, function (c) {
                var e;
                a && (e = this.r().className.search("fade-in"),
                    -1 !== e ? this.Fa() : this.ha());
                a = l;
                this.a.paused() || c.preventDefault()
            }))
        }))
    }});
    u.ba.prototype.f = {wd: "play", children: {playToggle: {}, currentTimeDisplay: {}, timeDivider: {}, durationDisplay: {}, remainingTimeDisplay: {}, progressControl: {}, fullscreenToggle: {}, volumeControl: {}, muteToggle: {}}};
    u.ba.prototype.e = function () {
        return u.e("div", {className: "vjs-control-bar"})
    };
    u.ba.prototype.ha = function () {
        u.c.prototype.ha.call(this);
        this.a.k("controlsvisible")
    };
    u.ba.prototype.Fa = function () {
        u.c.prototype.Fa.call(this);
        this.a.k("controlshidden")
    };
    u.Vb = u.o.extend({g: function (a, c) {
        u.o.call(this, a, c);
        a.d("play", u.bind(this, this.Ib));
        a.d("pause", u.bind(this, this.Hb))
    }});
    t = u.Vb.prototype;
    t.na = "Play";
    t.P = function () {
        return"vjs-play-control " + u.o.prototype.P.call(this)
    };
    t.n = function () {
        this.a.paused() ? this.a.play() : this.a.pause()
    };
    t.Ib = function () {
        u.w(this.b, "vjs-paused");
        u.p(this.b, "vjs-playing");
        this.b.children[0].children[0].innerHTML = "Pause"
    };
    t.Hb = function () {
        u.w(this.b, "vjs-playing");
        u.p(this.b, "vjs-paused");
        this.b.children[0].children[0].innerHTML = "Play"
    };
    u.Wa = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        a.d("timeupdate", u.bind(this, this.xa))
    }});
    u.Wa.prototype.e = function () {
        var a = u.c.prototype.e.call(this, "div", {className: "vjs-current-time vjs-time-controls vjs-control"});
        this.content = u.e("div", {className: "vjs-current-time-display", innerHTML: '<span class="vjs-control-text">Current Time </span>0:00', "aria-live": "off"});
        a.appendChild(u.e("div").appendChild(this.content));
        return a
    };
    u.Wa.prototype.xa = function () {
        var a = this.a.Lb ? this.a.s.currentTime : this.a.currentTime();
        this.content.innerHTML = '<span class="vjs-control-text">Current Time </span>' + u.Ga(a, this.a.duration())
    };
    u.Xa = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        a.d("timeupdate", u.bind(this, this.xa))
    }});
    u.Xa.prototype.e = function () {
        var a = u.c.prototype.e.call(this, "div", {className: "vjs-duration vjs-time-controls vjs-control"});
        this.content = u.e("div", {className: "vjs-duration-display", innerHTML: '<span class="vjs-control-text">Duration Time </span>0:00', "aria-live": "off"});
        a.appendChild(u.e("div").appendChild(this.content));
        return a
    };
    u.Xa.prototype.xa = function () {
        this.a.duration() && (this.content.innerHTML = '<span class="vjs-control-text">Duration Time </span>' + u.Ga(this.a.duration()))
    };
    u.Zb = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c)
    }});
    u.Zb.prototype.e = function () {
        return u.c.prototype.e.call(this, "div", {className: "vjs-time-divider", innerHTML: "<div><span>/</span></div>"})
    };
    u.eb = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        a.d("timeupdate", u.bind(this, this.xa))
    }});
    u.eb.prototype.e = function () {
        var a = u.c.prototype.e.call(this, "div", {className: "vjs-remaining-time vjs-time-controls vjs-control"});
        this.content = u.e("div", {className: "vjs-remaining-time-display", innerHTML: '<span class="vjs-control-text">Remaining Time </span>-0:00', "aria-live": "off"});
        a.appendChild(u.e("div").appendChild(this.content));
        return a
    };
    u.eb.prototype.xa = function () {
        this.a.duration() && this.a.duration() && (this.content.innerHTML = '<span class="vjs-control-text">Remaining Time </span>-' + u.Ga(this.a.duration() - this.a.currentTime()))
    };
    u.za = u.o.extend({g: function (a, c) {
        u.o.call(this, a, c)
    }});
    u.za.prototype.na = "Fullscreen";
    u.za.prototype.P = function () {
        return"vjs-fullscreen-control " + u.o.prototype.P.call(this)
    };
    u.za.prototype.n = function () {
        this.a.F ? (K(this.a), this.b.children[0].children[0].innerHTML = "Fullscreen") : (this.a.Pa(), this.b.children[0].children[0].innerHTML = "Non-Fullscreen")
    };
    u.cb = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c)
    }});
    u.cb.prototype.f = {children: {seekBar: {}}};
    u.cb.prototype.e = function () {
        return u.c.prototype.e.call(this, "div", {className: "vjs-progress-control vjs-control"})
    };
    u.Wb = u.J.extend({g: function (a, c) {
        u.J.call(this, a, c);
        a.d("timeupdate", u.bind(this, this.wa));
        a.M(u.bind(this, this.wa))
    }});
    t = u.Wb.prototype;
    t.f = {children: {loadProgressBar: {}, playProgressBar: {}, seekHandle: {}}, barName: "playProgressBar", handleName: "seekHandle"};
    t.pc = "timeupdate";
    t.e = function () {
        return u.J.prototype.e.call(this, "div", {className: "vjs-progress-holder", "aria-label": "video progress bar"})
    };
    t.wa = function () {
        var a = this.a.Lb ? this.a.s.currentTime : this.a.currentTime();
        this.b.setAttribute("aria-valuenow", u.round(100 * this.wb(), 2));
        this.b.setAttribute("aria-valuetext", u.Ga(a, this.a.duration()))
    };
    t.wb = function () {
        return this.a.currentTime() / this.a.duration()
    };
    t.Ka = function (a) {
        u.J.prototype.Ka.call(this, a);
        this.a.Lb = f;
        this.nd = !this.a.paused();
        this.a.pause()
    };
    t.Fb = function (a) {
        a = C(this, a) * this.a.duration();
        a == this.a.duration() && (a -= 0.1);
        this.a.currentTime(a)
    };
    t.Gb = function (a) {
        u.J.prototype.Gb.call(this, a);
        this.a.Lb = l;
        this.nd && this.a.play()
    };
    t.vc = function () {
        this.a.currentTime(this.a.currentTime() + 5)
    };
    t.uc = function () {
        this.a.currentTime(this.a.currentTime() - 5)
    };
    u.$a = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        a.d("progress", u.bind(this, this.update))
    }});
    u.$a.prototype.e = function () {
        return u.c.prototype.e.call(this, "div", {className: "vjs-load-progress", innerHTML: '<span class="vjs-control-text">Loaded: 0%</span>'})
    };
    u.$a.prototype.update = function () {
        this.b.style && (this.b.style.width = u.round(100 * H(this.a), 2) + "%")
    };
    u.Ub = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c)
    }});
    u.Ub.prototype.e = function () {
        return u.c.prototype.e.call(this, "div", {className: "vjs-play-progress", innerHTML: '<span class="vjs-control-text">Progress: 0%</span>'})
    };
    u.fb = u.fa.extend();
    u.fb.prototype.defaultValue = "00:00";
    u.fb.prototype.e = function () {
        return u.fa.prototype.e.call(this, "div", {className: "vjs-seek-handle"})
    };
    u.ib = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        a.h && (a.h.j && a.h.j.T === l) && this.p("vjs-hidden");
        a.d("loadstart", u.bind(this, function () {
            a.h.j && a.h.j.T === l ? this.p("vjs-hidden") : this.w("vjs-hidden")
        }))
    }});
    u.ib.prototype.f = {children: {volumeBar: {}}};
    u.ib.prototype.e = function () {
        return u.c.prototype.e.call(this, "div", {className: "vjs-volume-control vjs-control"})
    };
    u.hb = u.J.extend({g: function (a, c) {
        u.J.call(this, a, c);
        a.d("volumechange", u.bind(this, this.wa));
        a.M(u.bind(this, this.wa));
        setTimeout(u.bind(this, this.update), 0)
    }});
    t = u.hb.prototype;
    t.wa = function () {
        this.b.setAttribute("aria-valuenow", u.round(100 * this.a.volume(), 2));
        this.b.setAttribute("aria-valuetext", u.round(100 * this.a.volume(), 2) + "%")
    };
    t.f = {children: {volumeLevel: {}, volumeHandle: {}}, barName: "volumeLevel", handleName: "volumeHandle"};
    t.pc = "volumechange";
    t.e = function () {
        return u.J.prototype.e.call(this, "div", {className: "vjs-volume-bar", "aria-label": "volume level"})
    };
    t.Fb = function (a) {
        this.a.volume(C(this, a))
    };
    t.wb = function () {
        return this.a.muted() ? 0 : this.a.volume()
    };
    t.vc = function () {
        this.a.volume(this.a.volume() + 0.1)
    };
    t.uc = function () {
        this.a.volume(this.a.volume() - 0.1)
    };
    u.$b = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c)
    }});
    u.$b.prototype.e = function () {
        return u.c.prototype.e.call(this, "div", {className: "vjs-volume-level", innerHTML: '<span class="vjs-control-text"></span>'})
    };
    u.jb = u.fa.extend();
    u.jb.prototype.defaultValue = "00:00";
    u.jb.prototype.e = function () {
        return u.fa.prototype.e.call(this, "div", {className: "vjs-volume-handle"})
    };
    u.da = u.o.extend({g: function (a, c) {
        u.o.call(this, a, c);
        a.d("volumechange", u.bind(this, this.update));
        a.h && (a.h.j && a.h.j.T === l) && this.p("vjs-hidden");
        a.d("loadstart", u.bind(this, function () {
            a.h.j && a.h.j.T === l ? this.p("vjs-hidden") : this.w("vjs-hidden")
        }))
    }});
    u.da.prototype.e = function () {
        return u.o.prototype.e.call(this, "div", {className: "vjs-mute-control vjs-control", innerHTML: '<div><span class="vjs-control-text">Mute</span></div>'})
    };
    u.da.prototype.n = function () {
        this.a.muted(this.a.muted() ? l : f)
    };
    u.da.prototype.update = function () {
        var a = this.a.volume(), c = 3;
        0 === a || this.a.muted() ? c = 0 : 0.33 > a ? c = 1 : 0.67 > a && (c = 2);
        this.a.muted() ? "Unmute" != this.b.children[0].children[0].innerHTML && (this.b.children[0].children[0].innerHTML = "Unmute") : "Mute" != this.b.children[0].children[0].innerHTML && (this.b.children[0].children[0].innerHTML = "Mute");
        for (a = 0; 4 > a; a++)u.w(this.b, "vjs-vol-" + a);
        u.p(this.b, "vjs-vol-" + c)
    };
    u.Ba = u.ca.extend({g: function (a, c) {
        u.ca.call(this, a, c);
        a.d("volumechange", u.bind(this, this.update));
        a.h && (a.h.j && a.h.j.T === l) && this.p("vjs-hidden");
        a.d("loadstart", u.bind(this, function () {
            a.h.j && a.h.j.T === l ? this.p("vjs-hidden") : this.w("vjs-hidden")
        }));
        this.p("vjs-menu-button")
    }});
    u.Ba.prototype.Ea = function () {
        var a = new u.la(this.a, {Ic: "div"}), c = new u.hb(this.a, u.i.B({md: f}, this.f.zd));
        a.X(c);
        return a
    };
    u.Ba.prototype.n = function () {
        u.da.prototype.n.call(this);
        u.ca.prototype.n.call(this)
    };
    u.Ba.prototype.e = function () {
        return u.o.prototype.e.call(this, "div", {className: "vjs-volume-menu-button vjs-menu-button vjs-control", innerHTML: '<div><span class="vjs-control-text">Mute</span></div>'})
    };
    u.Ba.prototype.update = u.da.prototype.update;
    u.bb = u.o.extend({g: function (a, c) {
        u.o.call(this, a, c);
        (!a.poster() || !a.controls()) && this.v();
        a.d("play", u.bind(this, this.v))
    }});
    u.bb.prototype.e = function () {
        var a = u.e("div", {className: "vjs-poster", tabIndex: -1}), c = this.a.poster();
        c && ("backgroundSize"in a.style ? a.style.backgroundImage = 'url("' + c + '")' : a.appendChild(u.e("img", {src: c})));
        return a
    };
    u.bb.prototype.n = function () {
        this.a.play()
    };
    u.Tb = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        a.d("canplay", u.bind(this, this.v));
        a.d("canplaythrough", u.bind(this, this.v));
        a.d("playing", u.bind(this, this.v));
        a.d("seeked", u.bind(this, this.v));
        a.d("seeking", u.bind(this, this.show));
        a.d("seeked", u.bind(this, this.v));
        a.d("error", u.bind(this, this.show));
        a.d("waiting", u.bind(this, this.show))
    }});
    u.Tb.prototype.e = function () {
        return u.c.prototype.e.call(this, "div", {className: "vjs-loading-spinner"})
    };
    u.Ua = u.o.extend({g: function (a, c) {
        u.o.call(this, a, c);
        a.controls() || this.v();
        a.d("play", u.bind(this, this.v))
    }});
    u.Ua.prototype.e = function () {
        return u.o.prototype.e.call(this, "div", {className: "vjs-big-play-button", innerHTML: "<span></span>", "aria-label": "play video"})
    };
    u.Ua.prototype.n = function () {
        this.a.play()
    };
    u.q = u.c.extend({g: function (a, c, d) {
        u.c.call(this, a, c, d)
    }});
    u.q.prototype.n = u.Za ? m() : function () {
        this.a.controls() && (this.a.paused() ? this.a.play() : this.a.pause())
    };
    u.q.prototype.j = {T: f, hc: l, Kb: l, Nb: l};
    u.media = {};
    u.media.Ta = "play pause paused currentTime setCurrentTime duration buffered volume setVolume muted setMuted width height supportsFullScreen enterFullScreen src load currentSrc preload setPreload autoplay setAutoplay loop setLoop error networkState readyState seeking initialTime startOffsetTime played seekable ended videoTracks audioTracks videoWidth videoHeight textTracks defaultPlaybackRate playbackRate mediaGroup controller controls defaultMuted".split(" ");
    function da() {
        var a = u.media.Ta[i];
        return function () {
            throw Error('The "' + a + "\" method is not available on the playback technology's API");
        }
    }

    for (var i = u.media.Ta.length - 1; 0 <= i; i--)u.q.prototype[u.media.Ta[i]] = da();
    u.m = u.q.extend({g: function (a, c, d) {
        this.j.T = u.m.Hc();
        this.j.Sc = !u.Sb;
        this.j.hc = f;
        u.q.call(this, a, c, d);
        (c = c.source) && this.b.currentSrc == c.src ? a.k("loadstart") : c && (this.b.src = c.src);
        a.M(function () {
            this.f.autoplay && this.paused() && (this.N.poster = h, this.play())
        });
        this.d("click", this.n);
        for (a = u.m.Ya.length - 1; 0 <= a; a--)u.d(this.b, u.m.Ya[a], u.bind(this.a, this.Nc));
        this.Ra()
    }});
    t = u.m.prototype;
    t.C = function () {
        u.q.prototype.C.call(this)
    };
    t.e = function () {
        var a = this.a, c = a.N;
        if (!c || this.j.Sc === l)c ? (a.r().removeChild(c), c = c.cloneNode(l)) : c = u.e("video", {id: a.id() + "_html5_api", className: "vjs-tech"}), c.player = a, u.xb(c, a.r());
        for (var d = ["autoplay", "preload", "loop", "muted"], e = d.length - 1; 0 <= e; e--) {
            var g = d[e];
            a.f[g] !== h && (c[g] = a.f[g])
        }
        return c
    };
    t.Nc = function (a) {
        this.k(a);
        a.stopPropagation()
    };
    t.play = function () {
        this.b.play()
    };
    t.pause = function () {
        this.b.pause()
    };
    t.paused = function () {
        return this.b.paused
    };
    t.currentTime = function () {
        return this.b.currentTime
    };
    t.cd = function (a) {
        try {
            this.b.currentTime = a
        } catch (c) {
            u.log(c, "Video is not ready. (Video.js)")
        }
    };
    t.duration = function () {
        return this.b.duration || 0
    };
    t.buffered = function () {
        return this.b.buffered
    };
    t.volume = function () {
        return this.b.volume
    };
    t.hd = function (a) {
        this.b.volume = a
    };
    t.muted = function () {
        return this.b.muted
    };
    t.fd = function (a) {
        this.b.muted = a
    };
    t.width = function () {
        return this.b.offsetWidth
    };
    t.height = function () {
        return this.b.offsetHeight
    };
    t.Qa = function () {
        return"function" == typeof this.b.webkitEnterFullScreen && (/Android/.test(u.O) || !/Chrome|Mac OS X 10.5/.test(u.O)) ? f : l
    };
    t.src = function (a) {
        this.b.src = a
    };
    t.load = function () {
        this.b.load()
    };
    t.currentSrc = function () {
        return this.b.currentSrc
    };
    t.Ma = function () {
        return this.b.Ma
    };
    t.gd = function (a) {
        this.b.Ma = a
    };
    t.autoplay = function () {
        return this.b.autoplay
    };
    t.bd = function (a) {
        this.b.autoplay = a
    };
    t.loop = function () {
        return this.b.loop
    };
    t.ed = function (a) {
        this.b.loop = a
    };
    t.error = function () {
        return this.b.error
    };
    u.m.isSupported = function () {
        return!!document.createElement("video").canPlayType
    };
    u.m.mb = function (a) {
        return!!document.createElement("video").canPlayType(a.type)
    };
    u.m.Hc = function () {
        var a = u.gb.volume;
        u.gb.volume = a / 2 + 0.1;
        return a !== u.gb.volume
    };
    u.m.Ya = "loadstart suspend abort error emptied stalled loadedmetadata loadeddata canplay canplaythrough playing waiting seeking seeked ended durationchange timeupdate progress play pause ratechange volumechange".split(" ");
    u.Za && 3 > u.yc && (document.createElement("video").constructor.prototype.canPlayType = function (a) {
        return a && -1 != a.toLowerCase().indexOf("video/mp4") ? "maybe" : ""
    });
    u.l = u.q.extend({g: function (a, c, d) {
        u.q.call(this, a, c, d);
        d = c.source;
        var e = c.parentEl, g = this.b = u.e("div", {id: a.id() + "_temp_flash"}), j = a.id() + "_flash_api";
        a = a.f;
        var k = u.i.B({readyFunction: "videojs.Flash.onReady", eventProxyFunction: "videojs.Flash.onEvent", errorEventProxyFunction: "videojs.Flash.onError", autoplay: a.autoplay, preload: a.Ma, loop: a.loop, muted: a.muted}, c.flashVars), q = u.i.B({wmode: "opaque", bgcolor: "#000000"}, c.params), n = u.i.B({id: j, name: j, "class": "vjs-tech"}, c.attributes);
        d && (k.src = encodeURIComponent(u.ic(d.src)));
        u.xb(g, e);
        c.startTime && this.M(function () {
            this.load();
            this.play();
            this.currentTime(c.startTime)
        });
        if (c.iFrameMode === f && !u.zc) {
            var s = u.e("iframe", {id: j + "_iframe", name: j + "_iframe", className: "vjs-tech", scrolling: "no", marginWidth: 0, marginHeight: 0, frameBorder: 0});
            k.readyFunction = "ready";
            k.eventProxyFunction = "events";
            k.errorEventProxyFunction = "errors";
            u.d(s, "load", u.bind(this, function () {
                var a, d = s.contentWindow;
                a = s.contentDocument ? s.contentDocument : s.contentWindow.document;
                a.write(u.l.jc(c.swf, k, q, n));
                d.player =
                    this.a;
                d.ready = u.bind(this.a, function (c) {
                    c = a.getElementById(c);
                    var d = this.h;
                    d.b = c;
                    u.d(c, "click", d.bind(d.n));
                    u.l.ob(d)
                });
                d.events = u.bind(this.a, function (a, c) {
                    this && "flash" === this.ua && this.k(c)
                });
                d.errors = u.bind(this.a, function (a, c) {
                    u.log("Flash Error", c)
                })
            }));
            g.parentNode.replaceChild(s, g)
        } else u.l.Mc(c.swf, g, k, q, n)
    }});
    t = u.l.prototype;
    t.C = function () {
        u.q.prototype.C.call(this)
    };
    t.play = function () {
        this.b.vjs_play()
    };
    t.pause = function () {
        this.b.vjs_pause()
    };
    t.src = function (a) {
        a = u.ic(a);
        this.b.vjs_src(a);
        if (this.a.autoplay()) {
            var c = this;
            setTimeout(function () {
                c.play()
            }, 0)
        }
    };
    t.load = function () {
        this.b.vjs_load()
    };
    t.poster = function () {
        this.b.vjs_getProperty("poster")
    };
    t.buffered = function () {
        return u.rb(0, this.b.vjs_getProperty("buffered"))
    };
    t.Qa = r(l);
    var P = u.l.prototype, Q = "preload currentTime defaultPlaybackRate playbackRate autoplay loop mediaGroup controller controls volume muted defaultMuted".split(" "), R = "error currentSrc networkState readyState seeking initialTime duration startOffsetTime paused played seekable ended videoTracks audioTracks videoWidth videoHeight textTracks".split(" ");

    function ea() {
        var a = Q[S], c = a.charAt(0).toUpperCase() + a.slice(1);
        P["set" + c] = function (c) {
            return this.b.vjs_setProperty(a, c)
        }
    }

    function T(a) {
        P[a] = function () {
            return this.b.vjs_getProperty(a)
        }
    }

    var S;
    for (S = 0; S < Q.length; S++)T(Q[S]), ea();
    for (S = 0; S < R.length; S++)T(R[S]);
    u.l.isSupported = function () {
        return 10 <= u.l.version()[0]
    };
    u.l.mb = function (a) {
        if (a.type in u.l.Pc)return"maybe"
    };
    u.l.Pc = {"video/flv": "FLV", "video/x-flv": "FLV", "video/mp4": "MP4", "video/m4v": "MP4"};
    u.l.onReady = function (a) {
        a = u.r(a);
        var c = a.player || a.parentNode.player, d = c.h;
        a.player = c;
        d.b = a;
        d.d("click", d.n);
        u.l.ob(d)
    };
    u.l.ob = function (a) {
        a.r().vjs_getProperty ? a.Ra() : setTimeout(function () {
            u.l.ob(a)
        }, 50)
    };
    u.l.onEvent = function (a, c) {
        u.r(a).player.k(c)
    };
    u.l.onError = function (a, c) {
        u.r(a).player.k("error");
        u.log("Flash Error", c, a)
    };
    u.l.version = function () {
        var a = "0,0,0";
        try {
            a = (new window.ActiveXObject("ShockwaveFlash.ShockwaveFlash")).GetVariable("$version").replace(/\D+/g, ",").match(/^,?(.+),?$/)[1]
        } catch (c) {
            try {
                navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin && (a = (navigator.plugins["Shockwave Flash 2.0"] || navigator.plugins["Shockwave Flash"]).description.replace(/\D+/g, ",").match(/^,?(.+),?$/)[1])
            } catch (d) {
            }
        }
        return a.split(",")
    };
    u.l.Mc = function (a, c, d, e, g) {
        a = u.l.jc(a, d, e, g);
        a = u.e("div", {innerHTML: a}).childNodes[0];
        d = c.parentNode;
        c.parentNode.replaceChild(a, c);
        var j = d.childNodes[0];
        setTimeout(function () {
            j.style.display = "block"
        }, 1E3)
    };
    u.l.jc = function (a, c, d, e) {
        var g = "", j = "", k = "";
        c && u.i.qa(c, function (a, c) {
            g += a + "=" + c + "&amp;"
        });
        d = u.i.B({movie: a, flashvars: g, allowScriptAccess: "always", allowNetworking: "all"}, d);
        u.i.qa(d, function (a, c) {
            j += '<param name="' + a + '" value="' + c + '" />'
        });
        e = u.i.B({data: a, width: "100%", height: "100%"}, e);
        u.i.qa(e, function (a, c) {
            k += a + '="' + c + '" '
        });
        return'<object type="application/x-shockwave-flash"' + k + ">" + j + "</object>"
    };
    u.Dc = u.c.extend({g: function (a, c, d) {
        u.c.call(this, a, c, d);
        if (!a.f.sources || 0 === a.f.sources.length) {
            c = 0;
            for (d = a.f.techOrder; c < d.length; c++) {
                var e = u.Y(d[c]), g = window.videojs[e];
                if (g && g.isSupported()) {
                    F(a, e);
                    break
                }
            }
        } else a.src(a.f.sources)
    }});
    function U(a) {
        a.va = a.va || [];
        return a.va
    }

    function V(a, c, d) {
        for (var e = a.va, g = 0, j = e.length, k, q; g < j; g++)k = e[g], k.id() === c ? (k.show(), q = k) : d && (k.H() == d && 0 < k.mode()) && k.disable();
        (c = q ? q.H() : d ? d : l) && a.k(c + "trackchange")
    }

    u.U = u.c.extend({g: function (a, c) {
        u.c.call(this, a, c);
        this.L = c.id || "vjs_" + c.kind + "_" + c.language + "_" + u.u++;
        this.tc = c.src;
        this.Jc = c["default"] || c.dflt;
        this.kd = c.title;
        this.ud = c.srclang;
        this.Rc = c.label;
        this.ga = [];
        this.ac = [];
        this.ia = this.ja = 0;
        this.a.d("fullscreenchange", u.bind(this, this.Ec))
    }});
    t = u.U.prototype;
    t.H = p("A");
    t.src = p("tc");
    t.sb = p("Jc");
    t.title = p("kd");
    t.label = p("Rc");
    t.readyState = p("ja");
    t.mode = p("ia");
    t.Ec = function () {
        this.b.style.fontSize = this.a.F ? 140 * (screen.width / this.a.width()) + "%" : ""
    };
    t.e = function () {
        return u.c.prototype.e.call(this, "div", {className: "vjs-" + this.A + " vjs-text-track"})
    };
    t.show = function () {
        W(this);
        this.ia = 2;
        u.c.prototype.show.call(this)
    };
    t.v = function () {
        W(this);
        this.ia = 1;
        u.c.prototype.v.call(this)
    };
    t.disable = function () {
        2 == this.ia && this.v();
        this.a.t("timeupdate", u.bind(this, this.update, this.L));
        this.a.t("ended", u.bind(this, this.reset, this.L));
        this.reset();
        this.a.R.textTrackDisplay.removeChild(this);
        this.ia = 0
    };
    function W(a) {
        0 === a.ja && a.load();
        0 === a.ia && (a.a.d("timeupdate", u.bind(a, a.update, a.L)), a.a.d("ended", u.bind(a, a.reset, a.L)), ("captions" === a.A || "subtitles" === a.A) && a.a.R.textTrackDisplay.X(a))
    }

    t.load = function () {
        0 === this.ja && (this.ja = 1, u.get(this.tc, u.bind(this, this.Zc), u.bind(this, this.Eb)))
    };
    t.Eb = function (a) {
        this.error = a;
        this.ja = 3;
        this.k("error")
    };
    t.Zc = function (a) {
        var c, d;
        a = a.split("\n");
        for (var e = "", g = 1, j = a.length; g < j; g++)if (e = u.trim(a[g])) {
            -1 == e.indexOf("--\x3e") ? (c = e, e = u.trim(a[++g])) : c = this.ga.length;
            c = {id: c, index: this.ga.length};
            d = e.split(" --\x3e ");
            c.startTime = X(d[0]);
            c.ra = X(d[1]);
            for (d = []; a[++g] && (e = u.trim(a[g]));)d.push(e);
            c.text = d.join("<br/>");
            this.ga.push(c)
        }
        this.ja = 2;
        this.k("loaded")
    };
    function X(a) {
        var c = a.split(":");
        a = 0;
        var d, e, g;
        3 == c.length ? (d = c[0], e = c[1], c = c[2]) : (d = 0, e = c[0], c = c[1]);
        c = c.split(/\s+/);
        c = c.splice(0, 1)[0];
        c = c.split(/\.|,/);
        g = parseFloat(c[1]);
        c = c[0];
        a += 3600 * parseFloat(d);
        a += 60 * parseFloat(e);
        a += parseFloat(c);
        g && (a += g / 1E3);
        return a
    }

    t.update = function () {
        if (0 < this.ga.length) {
            var a = this.a.currentTime();
            if (this.Jb === b || a < this.Jb || this.Ha <= a) {
                var c = this.ga, d = this.a.duration(), e = 0, g = l, j = [], k, q, n, s;
                a >= this.Ha || this.Ha === b ? s = this.ub !== b ? this.ub : 0 : (g = f, s = this.Bb !== b ? this.Bb : c.length - 1);
                for (; ;) {
                    n = c[s];
                    if (n.ra <= a)e = Math.max(e, n.ra), n.Ca && (n.Ca = l); else if (a < n.startTime) {
                        if (d = Math.min(d, n.startTime), n.Ca && (n.Ca = l), !g)break
                    } else g ? (j.splice(0, 0, n), q === b && (q = s), k = s) : (j.push(n), k === b && (k = s), q = s), d = Math.min(d, n.ra), e = Math.max(e, n.startTime),
                        n.Ca = f;
                    if (g)if (0 === s)break; else s--; else if (s === c.length - 1)break; else s++
                }
                this.ac = j;
                this.Ha = d;
                this.Jb = e;
                this.ub = k;
                this.Bb = q;
                a = this.ac;
                c = "";
                d = 0;
                for (e = a.length; d < e; d++)c += '<span class="vjs-tt-cue">' + a[d].text + "</span>";
                this.b.innerHTML = c;
                this.k("cuechange")
            }
        }
    };
    t.reset = function () {
        this.Ha = 0;
        this.Jb = this.a.duration();
        this.Bb = this.ub = 0
    };
    u.Pb = u.U.extend();
    u.Pb.prototype.A = "captions";
    u.Xb = u.U.extend();
    u.Xb.prototype.A = "subtitles";
    u.Rb = u.U.extend();
    u.Rb.prototype.A = "chapters";
    u.Yb = u.c.extend({g: function (a, c, d) {
        u.c.call(this, a, c, d);
        if (a.f.tracks && 0 < a.f.tracks.length) {
            c = this.a;
            a = a.f.tracks;
            var e;
            for (d = 0; d < a.length; d++) {
                e = a[d];
                var g = c, j = e.kind, k = e.label, q = e.language, n = e;
                e = g.va = g.va || [];
                n = n || {};
                n.kind = j;
                n.label = k;
                n.language = q;
                j = u.Y(j || "subtitles");
                g = new window.videojs[j + "Track"](g, n);
                e.push(g)
            }
        }
    }});
    u.Yb.prototype.e = function () {
        return u.c.prototype.e.call(this, "div", {className: "vjs-text-track-display"})
    };
    u.W = u.I.extend({g: function (a, c) {
        var d = this.aa = c.track;
        c.label = d.label();
        c.selected = d.sb();
        u.I.call(this, a, c);
        this.a.d(d.H() + "trackchange", u.bind(this, this.update))
    }});
    u.W.prototype.n = function () {
        u.I.prototype.n.call(this);
        V(this.a, this.aa.L, this.aa.H())
    };
    u.W.prototype.update = function () {
        2 == this.aa.mode() ? this.selected(f) : this.selected(l)
    };
    u.ab = u.W.extend({g: function (a, c) {
        c.track = {H: function () {
            return c.kind
        }, oc: a, label: function () {
            return c.kind + " off"
        }, sb: r(l), mode: r(l)};
        u.W.call(this, a, c);
        this.selected(f)
    }});
    u.ab.prototype.n = function () {
        u.W.prototype.n.call(this);
        V(this.a, this.aa.L, this.aa.H())
    };
    u.ab.prototype.update = function () {
        for (var a = U(this.a), c = 0, d = a.length, e, g = f; c < d; c++)e = a[c], e.H() == this.aa.H() && 2 == e.mode() && (g = l);
        g ? this.selected(f) : this.selected(l)
    };
    u.V = u.ca.extend({g: function (a, c) {
        u.ca.call(this, a, c);
        1 >= this.G.length && this.v()
    }});
    u.V.prototype.qb = function () {
        var a = [], c;
        a.push(new u.ab(this.a, {kind: this.A}));
        for (var d = 0; d < U(this.a).length; d++)c = U(this.a)[d], c.H() === this.A && a.push(new u.W(this.a, {track: c}));
        return a
    };
    u.ya = u.V.extend({g: function (a, c, d) {
        u.V.call(this, a, c, d);
        this.b.setAttribute("aria-label", "Captions Menu")
    }});
    u.ya.prototype.A = "captions";
    u.ya.prototype.na = "Captions";
    u.ya.prototype.className = "vjs-captions-button";
    u.Aa = u.V.extend({g: function (a, c, d) {
        u.V.call(this, a, c, d);
        this.b.setAttribute("aria-label", "Subtitles Menu")
    }});
    u.Aa.prototype.A = "subtitles";
    u.Aa.prototype.na = "Subtitles";
    u.Aa.prototype.className = "vjs-subtitles-button";
    u.Qb = u.V.extend({g: function (a, c, d) {
        u.V.call(this, a, c, d);
        this.b.setAttribute("aria-label", "Chapters Menu")
    }});
    t = u.Qb.prototype;
    t.A = "chapters";
    t.na = "Chapters";
    t.className = "vjs-chapters-button";
    t.qb = function () {
        for (var a = [], c, d = 0; d < U(this.a).length; d++)c = U(this.a)[d], c.H() === this.A && a.push(new u.W(this.a, {track: c}));
        return a
    };
    t.Ea = function () {
        for (var a = U(this.a), c = 0, d = a.length, e, g, j = this.G = []; c < d; c++)if (e = a[c], e.H() == this.A && e.sb()) {
            if (2 > e.readyState()) {
                this.sd = e;
                e.d("loaded", u.bind(this, this.Ea));
                return
            }
            g = e;
            break
        }
        a = this.sa = new u.la(this.a);
        a.b.appendChild(u.e("li", {className: "vjs-menu-title", innerHTML: u.Y(this.A), jd: -1}));
        if (g) {
            e = g.ga;
            for (var k, c = 0, d = e.length; c < d; c++)k = e[c], k = new u.Va(this.a, {track: g, cue: k}), j.push(k), a.X(k)
        }
        0 < this.G.length && this.show();
        return a
    };
    u.Va = u.I.extend({g: function (a, c) {
        var d = this.aa = c.track, e = this.cue = c.cue, g = a.currentTime();
        c.label = e.text;
        c.selected = e.startTime <= g && g < e.ra;
        u.I.call(this, a, c);
        d.d("cuechange", u.bind(this, this.update))
    }});
    u.Va.prototype.n = function () {
        u.I.prototype.n.call(this);
        this.a.currentTime(this.cue.startTime);
        this.update(this.cue.startTime)
    };
    u.Va.prototype.update = function () {
        var a = this.cue, c = this.a.currentTime();
        a.startTime <= c && c < a.ra ? this.selected(f) : this.selected(l)
    };
    u.i.B(u.ba.prototype.f.children, {subtitlesButton: {}, captionsButton: {}, chaptersButton: {}});
    if ("undefined" !== typeof window.JSON && "function" === window.JSON.parse)u.JSON = window.JSON; else {
        u.JSON = {};
        var Y = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
        u.JSON.parse = function (a, c) {
            function d(a, e) {
                var k, q, n = a[e];
                if (n && "object" === typeof n)for (k in n)Object.prototype.hasOwnProperty.call(n, k) && (q = d(n, k), q !== b ? n[k] = q : delete n[k]);
                return c.call(a, e, n)
            }

            var e;
            a = String(a);
            Y.lastIndex = 0;
            Y.test(a) && (a = a.replace(Y, function (a) {
                return"\\u" + ("0000" + a.charCodeAt(0).toString(16)).slice(-4)
            }));
            if (/^[\],:{}\s]*$/.test(a.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, "")))return e = eval("(" + a + ")"), "function" === typeof c ? d({"": e}, "") : e;
            throw new SyntaxError("JSON.parse(): invalid or malformed JSON data");
        }
    }
    u.bc = function () {
        var a, c, d = document.getElementsByTagName("video");
        if (d && 0 < d.length)for (var e = 0, g = d.length; e < g; e++)if ((c = d[e]) && c.getAttribute)c.player === b && (a = c.getAttribute("data-setup"), a !== h && (a = u.JSON.parse(a || "{}"), v(c, a))); else {
            u.kb();
            break
        } else u.od || u.kb()
    };
    u.kb = function () {
        setTimeout(u.bc, 1)
    };
    u.Q(window, "load", function () {
        u.od = f
    });
    u.kb();
    u.$c = function (a, c) {
        u.ea.prototype[a] = c
    };
    var Z = this;
    Z.pd = f;
    function $(a, c) {
        var d = a.split("."), e = Z;
        !(d[0]in e) && e.execScript && e.execScript("var " + d[0]);
        for (var g; d.length && (g = d.shift());)!d.length && c !== b ? e[g] = c : e = e[g] ? e[g] : e[g] = {}
    };
    $("videojs", u);
    $("_V_", u);
    $("videojs.options", u.options);
    $("videojs.cache", u.oa);
    $("videojs.Component", u.c);
    u.c.prototype.dispose = u.c.prototype.C;
    u.c.prototype.createEl = u.c.prototype.e;
    u.c.prototype.el = u.c.prototype.r;
    u.c.prototype.addChild = u.c.prototype.X;
    u.c.prototype.children = u.c.prototype.children;
    u.c.prototype.on = u.c.prototype.d;
    u.c.prototype.off = u.c.prototype.t;
    u.c.prototype.one = u.c.prototype.Q;
    u.c.prototype.trigger = u.c.prototype.k;
    u.c.prototype.triggerReady = u.c.prototype.Ra;
    u.c.prototype.show = u.c.prototype.show;
    u.c.prototype.hide = u.c.prototype.v;
    u.c.prototype.width = u.c.prototype.width;
    u.c.prototype.height = u.c.prototype.height;
    u.c.prototype.dimensions = u.c.prototype.Kc;
    u.c.prototype.ready = u.c.prototype.M;
    $("videojs.Player", u.ea);
    u.ea.prototype.dispose = u.ea.prototype.C;
    $("videojs.MediaLoader", u.Dc);
    $("videojs.TextTrackDisplay", u.Yb);
    $("videojs.ControlBar", u.ba);
    $("videojs.Button", u.o);
    $("videojs.PlayToggle", u.Vb);
    $("videojs.FullscreenToggle", u.za);
    $("videojs.BigPlayButton", u.Ua);
    $("videojs.LoadingSpinner", u.Tb);
    $("videojs.CurrentTimeDisplay", u.Wa);
    $("videojs.DurationDisplay", u.Xa);
    $("videojs.TimeDivider", u.Zb);
    $("videojs.RemainingTimeDisplay", u.eb);
    $("videojs.Slider", u.J);
    $("videojs.ProgressControl", u.cb);
    $("videojs.SeekBar", u.Wb);
    $("videojs.LoadProgressBar", u.$a);
    $("videojs.PlayProgressBar", u.Ub);
    $("videojs.SeekHandle", u.fb);
    $("videojs.VolumeControl", u.ib);
    $("videojs.VolumeBar", u.hb);
    $("videojs.VolumeLevel", u.$b);
    $("videojs.VolumeHandle", u.jb);
    $("videojs.MuteToggle", u.da);
    $("videojs.PosterImage", u.bb);
    $("videojs.Menu", u.la);
    $("videojs.MenuItem", u.I);
    $("videojs.SubtitlesButton", u.Aa);
    $("videojs.CaptionsButton", u.ya);
    $("videojs.ChaptersButton", u.Qb);
    $("videojs.MediaTechController", u.q);
    u.q.prototype.features = u.q.prototype.j;
    u.q.prototype.j.volumeControl = u.q.prototype.j.T;
    u.q.prototype.j.fullscreenResize = u.q.prototype.j.hc;
    u.q.prototype.j.progressEvents = u.q.prototype.j.Kb;
    u.q.prototype.j.timeupdateEvents = u.q.prototype.j.Nb;
    $("videojs.Html5", u.m);
    u.m.Events = u.m.Ya;
    u.m.isSupported = u.m.isSupported;
    u.m.canPlaySource = u.m.mb;
    u.m.prototype.setCurrentTime = u.m.prototype.cd;
    u.m.prototype.setVolume = u.m.prototype.hd;
    u.m.prototype.setMuted = u.m.prototype.fd;
    u.m.prototype.setPreload = u.m.prototype.gd;
    u.m.prototype.setAutoplay = u.m.prototype.bd;
    u.m.prototype.setLoop = u.m.prototype.ed;
    $("videojs.Flash", u.l);
    u.l.isSupported = u.l.isSupported;
    u.l.canPlaySource = u.l.mb;
    u.l.onReady = u.l.onReady;
    $("videojs.TextTrack", u.U);
    u.U.prototype.label = u.U.prototype.label;
    $("videojs.CaptionsTrack", u.Pb);
    $("videojs.SubtitlesTrack", u.Xb);
    $("videojs.ChaptersTrack", u.Rb);
    $("videojs.autoSetup", u.bc);
    $("videojs.plugin", u.$c);
    $("videojs.createTimeRange", u.rb);
})();//@ sourceMappingURL=video.js.map
