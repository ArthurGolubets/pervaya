!(function (e, t) {
    "object" == typeof exports && "object" == typeof module
        ? (module.exports = t(require("window")))
        : "function" == typeof define && define.amd
        ? define(["window"], t)
        : "object" == typeof exports
            ? (exports.NiceSelect = t(require("window")))
            : (e.NiceSelect = t(e.window));
})(this, function (e) {
    return (function (e) {
        var t = {};
        function n(i) {
            if (t[i]) return t[i].exports;
            var o = (t[i] = { i: i, l: !1, exports: {} });
            return e[i].call(o.exports, o, o.exports, n), (o.l = !0), o.exports;
        }
        return (
            (n.m = e),
                (n.c = t),
                (n.d = function (e, t, i) {
                    n.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: i });
                }),
                (n.r = function (e) {
                    "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 });
                }),
                (n.t = function (e, t) {
                    if ((1 & t && (e = n(e)), 8 & t)) return e;
                    if (4 & t && "object" == typeof e && e && e.__esModule) return e;
                    var i = Object.create(null);
                    if ((n.r(i), Object.defineProperty(i, "default", { enumerable: !0, value: e }), 2 & t && "string" != typeof e))
                        for (var o in e)
                            n.d(
                                i,
                                o,
                                function (t) {
                                    return e[t];
                                }.bind(null, o)
                            );
                    return i;
                }),
                (n.n = function (e) {
                    var t =
                        e && e.__esModule
                            ? function () {
                                return e.default;
                            }
                            : function () {
                                return e;
                            };
                    return n.d(t, "a", t), t;
                }),
                (n.o = function (e, t) {
                    return Object.prototype.hasOwnProperty.call(e, t);
                }),
                (n.p = "/"),
                n((n.s = 0))
        );
    })([
        function (e, t, n) {
            "use strict";
            n.r(t),
                function (e) {
                    n.d(t, "bind", function () {
                        return u;
                    });
                    n(2);
                    function i(e) {
                        var t = document.createEvent("MouseEvents");
                        t.initEvent("click", !0, !1), e.dispatchEvent(t);
                    }
                    function o(e) {
                        var t = document.createEvent("HTMLEvents");
                        t.initEvent("change", !0, !1), e.dispatchEvent(t);
                    }
                    function s(e, t) {
                        return e.getAttribute(t);
                    }
                    function r(e, t) {
                        return !!e && e.classList.contains(t);
                    }
                    function d(e, t) {
                        if (e) return e.classList.add(t);
                    }
                    function l(e, t) {
                        if (e) return e.classList.remove(t);
                    }
                    var c = { data: null, searchable: !1 };
                    function a(e, t) {
                        (this.el = e),
                            (this.config = Object.assign({}, c, t || {})),
                            (this.data = this.config.data),
                            (this.selectedOptions = []),
                            (this.placeholder = s(this.el, "placeholder") || this.config.placeholder || "Select an option"),
                            (this.dropdown = null),
                            (this.multiple = s(this.el, "multiple")),
                            (this.disabled = s(this.el, "disabled")),
                            this.create();
                    }
                    function u(e, t) {
                        return new a(e, t);
                    }
                    (a.prototype.create = function () {
                        (this.el.style.display = "none"), this.data ? this.processData(this.data) : this.extractData(), this.renderDropdown(), this.bindEvent();
                    }),
                        (a.prototype.processData = function (e) {
                            var t = [];
                            e.forEach(function (e) {
                                t.push({ data: e, attributes: { selected: !1, disabled: !1 } });
                            }),
                                (this.options = t);
                        }),
                        (a.prototype.extractData = function () {
                            var e = [],
                                t = [],
                                n = [];
                            this.el.querySelectorAll("option").forEach(function (n) {
                                var i = { text: n.innerText, value: n.value },
                                    o = { selected: null != n.getAttribute("selected"), disabled: null != n.getAttribute("disabled") };
                                for (const [key, value] of Object.entries(n.dataset)) {
                                    i[key] = value
                                }
                                e.push(i), t.push({ data: i, attributes: o });
                            }),
                                (this.data = e),
                                (this.options = t),
                                this.options.forEach(function (e) {
                                    e.attributes.selected && n.push(e);
                                }),
                                (this.selectedOptions = n);
                        }),
                        (a.prototype.renderDropdown = function () {
                            var e = ["nice-select", s(this.el, "class") || "", this.disabled ? "disabled" : "", this.multiple ? "has-multiple" : ""],
                                t = '<div class="'
                                    .concat(e.join(" "), '" tabindex="')
                                    .concat(this.disabled ? null : 0, '">\n  <span class="')
                                    .concat(this.multiple ? "multiple-options" : "current", '"></span>\n  <div class="nice-select-dropdown">\n  ')
                                    .concat(
                                        this.config.searchable ? '<div class="nice-select-search-box">\n<input type="text" class="nice-select-search" placeholder="Search..."/>\n</div>' : "",
                                        '\n  <ul class="list"></ul>\n  </div></div>\n'
                                    );
                            this.el.insertAdjacentHTML("afterend", t), (this.dropdown = this.el.nextElementSibling), this._renderSelectedItems(), this._renderItems();
                        }),
                        (a.prototype._renderSelectedItems = function () {
                            if (this.multiple) {
                                var e = "";
                                this.selectedOptions.forEach(function (t) {
                                    e += '<span class="current">'.concat(t.data.text, "</span>");
                                }),
                                    (e = "" == e ? this.placeholder : e),
                                    (this.dropdown.querySelector(".multiple-options").innerHTML = e);
                            } else {
                                var t = this.selectedOptions.length > 0 ? this.selectedOptions[0].data.text : this.placeholder;
                                if (this.selectedOptions[0]){
                                    for (const [key, value] of Object.entries(this.selectedOptions[0].data)) {
                                        if (key !== 'text'){
                                            this.dropdown.querySelector(".current").dataset[key] = value
                                        }
                                    }
                                }
                                this.dropdown.querySelector(".current").innerHTML = t;

                            }
                        }),
                        (a.prototype._renderItems = function () {
                            var e = this,
                                t = this.dropdown.querySelector("ul");
                            this.options.forEach(function (n) {
                                t.appendChild(e._renderItem(n));
                            });
                        }),
                        (a.prototype._renderItem = function (e) {
                            var t,
                            n = document.createElement("li");
                            for (const [key, value] of Object.entries(e.data)) {
                                if (key!=='text'){
                                    n.setAttribute(`data-${key}`, value.toString());
                                }
                            }
                            var i = ["option", e.attributes.selected ? "selected" : null, e.attributes.disabled ? "disabled" : null];
                            return (t = n.classList).add.apply(t, i), (n.innerHTML = e.data.text), n.addEventListener("click", this._onItemClicked.bind(this, e)), (e.element = n), n;
                        }),
                        (a.prototype.update = function () {
                            if ((this.extractData(), this.dropdown)) {
                                var e = r(this.dropdown, "open");
                                this.dropdown.parentNode.removeChild(this.dropdown), this.create(), e && i(this.dropdown);
                            }
                        }),
                        (a.prototype.disable = function () {
                            this.disabled || ((this.disabled = !0), d(this.dropdown, "disabled"));
                        }),
                        (a.prototype.enable = function () {
                            this.disabled && ((this.disabled = !1), l(this.dropdown, "disabled"));
                        }),
                        (a.prototype.clear = function () {
                            (this.selectedOptions = []), this._renderSelectedItems(), this.updateSelectValue(), o(this.el);
                        }),
                        (a.prototype.destroy = function () {
                            this.dropdown && (this.dropdown.parentNode.removeChild(this.dropdown), (this.el.style.display = ""));
                        }),
                        (a.prototype.bindEvent = function () {
                            this.dropdown.addEventListener("click", this._onClicked.bind(this)),
                                this.dropdown.addEventListener("keydown", this._onKeyPressed.bind(this)),
                                e.addEventListener("click", this._onClickedOutside.bind(this)),
                            this.config.searchable && this._bindSearchEvent();
                        }),
                        (a.prototype._bindSearchEvent = function () {
                            var e = this.dropdown.querySelector(".nice-select-search");
                            e &&
                            e.addEventListener("click", function (e) {
                                return e.stopPropagation(), !1;
                            }),
                                e.addEventListener("input", this._onSearchChanged.bind(this));
                        }),
                        (a.prototype._onClicked = function (e) {
                            if ((this.dropdown.classList.toggle("open"), this.dropdown.classList.contains("open"))) {
                                var t = this.dropdown.querySelector(".nice-select-search");
                                t && ((t.value = ""), t.focus());
                                var n = this.dropdown.querySelector(".focus");
                                l(n, "focus"),
                                    d((n = this.dropdown.querySelector(".selected")), "focus"),
                                    this.dropdown.querySelectorAll("ul li").forEach(function (e) {
                                        e.style.display = "";
                                    });
                            } else this.dropdown.focus();
                        }),
                        (a.prototype._onItemClicked = function (e, t) {
                            var n = t.target;
                            r(n, "disabled") ||
                            (this.multiple
                                ? r(n, "selected") || (d(n, "selected"), this.selectedOptions.push(e))
                                : (this.selectedOptions.forEach(function (e) {
                                    l(e.element, "selected");
                                }),
                                    d(n, "selected"),
                                    (this.selectedOptions = [e])),
                                this._renderSelectedItems(),
                                this.updateSelectValue());
                        }),
                        (a.prototype.updateSelectValue = function () {
                            this.multiple
                                ? this.selectedOptions.each(function (e) {
                                    var t = this.el.querySelector('option[value="' + e.data.value + '"]');
                                    t && t.setAttribute("selected", !0);
                                })
                                : this.selectedOptions.length > 0 && (this.el.value = this.selectedOptions[0].data.value),
                                o(this.el);
                        }),
                        (a.prototype._onClickedOutside = function (e) {
                            this.dropdown.contains(e.target) || this.dropdown.classList.remove("open");
                        }),
                        (a.prototype._onKeyPressed = function (e) {
                            var t = this.dropdown.querySelector(".focus"),
                                n = this.dropdown.classList.contains("open");
                            if (32 == e.keyCode || 13 == e.keyCode) i(n ? t : this.dropdown);
                            else if (40 == e.keyCode) {
                                if (n) {
                                    var o = this._findNext(t);
                                    if (o) l(this.dropdown.querySelector(".focus"), "focus"), d(o, "focus");
                                } else i(this.dropdown);
                                e.preventDefault();
                            } else if (38 == e.keyCode) {
                                if (n) {
                                    var s = this._findPrev(t);
                                    if (s) l(this.dropdown.querySelector(".focus"), "focus"), d(s, "focus");
                                } else i(this.dropdown);
                                e.preventDefault();
                            } else 27 == e.keyCode && n && i(this.dropdown);
                            return !1;
                        }),
                        (a.prototype._findNext = function (e) {
                            for (e = e ? e.nextElementSibling : this.dropdown.querySelector(".list .option"); e; ) {
                                if (!r(e, "disabled") && "none" != e.style.display) return e;
                                e = e.nextElementSibling;
                            }
                            return null;
                        }),
                        (a.prototype._findPrev = function (e) {
                            for (e = e ? e.previousElementSibling : this.dropdown.querySelector(".list .option:last-child"); e; ) {
                                if (!r(e, "disabled") && "none" != e.style.display) return e;
                                e = e.previousElementSibling;
                            }
                            return null;
                        }),
                        (a.prototype._onSearchChanged = function (e) {
                            var t = this.dropdown.classList.contains("open"),
                                n = e.target.value;
                            if ("" == (n = n.toLowerCase()))
                                this.options.forEach(function (e) {
                                    e.element.style.display = "";
                                });
                            else if (t) {
                                var i = new RegExp(n);
                                this.options.forEach(function (e) {
                                    var t = e.data.text.toLowerCase(),
                                        n = i.test(t);
                                    e.element.style.display = n ? "" : "none";
                                });
                            }
                            this.dropdown.querySelectorAll(".focus").forEach(function (e) {
                                l(e, "focus");
                            }),
                                d(this._findNext(null), "focus");
                        });
                }.call(this, n(1));
        },
        function (t, n) {
            t.exports = e;
        },
        function (e, t, n) {},
    ]);
});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9OaWNlU2VsZWN0L3dlYnBhY2svdW5pdmVyc2FsTW9kdWxlRGVmaW5pdGlvbiIsIndlYnBhY2s6Ly9OaWNlU2VsZWN0L3dlYnBhY2svYm9vdHN0cmFwIiwid2VicGFjazovL05pY2VTZWxlY3QvLi9uaWNlLXNlbGVjdDIuanMiLCJ3ZWJwYWNrOi8vTmljZVNlbGVjdC9leHRlcm5hbCBcIndpbmRvd1wiIl0sIm5hbWVzIjpbInJvb3QiLCJmYWN0b3J5IiwiZXhwb3J0cyIsIm1vZHVsZSIsInJlcXVpcmUiLCJkZWZpbmUiLCJhbWQiLCJ0aGlzIiwiX19XRUJQQUNLX0VYVEVSTkFMX01PRFVMRV9fMV9fIiwiaW5zdGFsbGVkTW9kdWxlcyIsIl9fd2VicGFja19yZXF1aXJlX18iLCJtb2R1bGVJZCIsImkiLCJsIiwibW9kdWxlcyIsImNhbGwiLCJtIiwiYyIsImQiLCJuYW1lIiwiZ2V0dGVyIiwibyIsIk9iamVjdCIsImRlZmluZVByb3BlcnR5IiwiZW51bWVyYWJsZSIsImdldCIsInIiLCJTeW1ib2wiLCJ0b1N0cmluZ1RhZyIsInZhbHVlIiwidCIsIm1vZGUiLCJfX2VzTW9kdWxlIiwibnMiLCJjcmVhdGUiLCJrZXkiLCJiaW5kIiwibiIsIm9iamVjdCIsInByb3BlcnR5IiwicHJvdG90eXBlIiwiaGFzT3duUHJvcGVydHkiLCJwIiwicyIsIl9fd2VicGFja19leHBvcnRzX18iLCJ3aW5kb3ciLCJ0cmlnZ2VyQ2xpY2siLCJlbCIsImV2ZW50IiwiZG9jdW1lbnQiLCJjcmVhdGVFdmVudCIsImluaXRFdmVudCIsImRpc3BhdGNoRXZlbnQiLCJ0cmlnZ2VyQ2hhbmdlIiwiYXR0ciIsImdldEF0dHJpYnV0ZSIsImhhc0NsYXNzIiwiY2xhc3NOYW1lIiwiY2xhc3NMaXN0IiwiY29udGFpbnMiLCJhZGRDbGFzcyIsImFkZCIsInJlbW92ZUNsYXNzIiwicmVtb3ZlIiwiZGVmYXVsdE9wdGlvbnMiLCJkYXRhIiwic2VhcmNoYWJsZSIsIk5pY2VTZWxlY3QiLCJlbGVtZW50Iiwib3B0aW9ucyIsImNvbmZpZyIsImFzc2lnbiIsInNlbGVjdGVkT3B0aW9ucyIsInBsYWNlaG9sZGVyIiwiZHJvcGRvd24iLCJtdWx0aXBsZSIsImRpc2FibGVkIiwic3R5bGUiLCJkaXNwbGF5IiwicHJvY2Vzc0RhdGEiLCJleHRyYWN0RGF0YSIsInJlbmRlckRyb3Bkb3duIiwiYmluZEV2ZW50IiwiZm9yRWFjaCIsIml0ZW0iLCJwdXNoIiwiYXR0cmlidXRlcyIsInNlbGVjdGVkIiwiYWxsT3B0aW9ucyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJpdGVtRGF0YSIsInRleHQiLCJpbm5lclRleHQiLCJjbGFzc2VzIiwiaHRtbCIsImNvbmNhdCIsImpvaW4iLCJpbnNlcnRBZGphY2VudEhUTUwiLCJuZXh0RWxlbWVudFNpYmxpbmciLCJfcmVuZGVyU2VsZWN0ZWRJdGVtcyIsIl9yZW5kZXJJdGVtcyIsInNlbGVjdGVkSHRtbCIsInF1ZXJ5U2VsZWN0b3IiLCJpbm5lckhUTUwiLCJsZW5ndGgiLCJfdGhpcyIsInVsIiwiYXBwZW5kQ2hpbGQiLCJfcmVuZGVySXRlbSIsIm9wdGlvbiIsIl9lbCRjbGFzc0xpc3QiLCJjcmVhdGVFbGVtZW50Iiwic2V0QXR0cmlidXRlIiwiYXBwbHkiLCJhZGRFdmVudExpc3RlbmVyIiwiX29uSXRlbUNsaWNrZWQiLCJ1cGRhdGUiLCJvcGVuIiwicGFyZW50Tm9kZSIsInJlbW92ZUNoaWxkIiwiZGlzYWJsZSIsImVuYWJsZSIsImNsZWFyIiwidXBkYXRlU2VsZWN0VmFsdWUiLCJkZXN0cm95IiwiX29uQ2xpY2tlZCIsIl9vbktleVByZXNzZWQiLCJfb25DbGlja2VkT3V0c2lkZSIsIl9iaW5kU2VhcmNoRXZlbnQiLCJzZWFyY2hCb3giLCJlIiwic3RvcFByb3BhZ2F0aW9uIiwiX29uU2VhcmNoQ2hhbmdlZCIsInRvZ2dsZSIsInNlYXJjaCIsImZvY3VzIiwib3B0aW9uRWwiLCJ0YXJnZXQiLCJlYWNoIiwiZm9jdXNlZE9wdGlvbiIsImtleUNvZGUiLCJuZXh0IiwiX2ZpbmROZXh0IiwicHJldmVudERlZmF1bHQiLCJwcmV2IiwiX2ZpbmRQcmV2IiwicHJldmlvdXNFbGVtZW50U2libGluZyIsInRvTG93ZXJDYXNlIiwibWF0Y2hSZWciLCJSZWdFeHAiLCJvcHRpb25UZXh0IiwibWF0Y2hlZCIsInRlc3QiXSwibWFwcGluZ3MiOiJDQUFBLFNBQUFBLEVBQUFDLEdBQ0EsaUJBQUFDLFNBQUEsaUJBQUFDLE9BQ0FBLE9BQUFELFFBQUFELEVBQUFHLFFBQUEsV0FDQSxtQkFBQUMsZUFBQUMsSUFDQUQsUUFBQSxVQUFBSixHQUNBLGlCQUFBQyxRQUNBQSxRQUFBLFdBQUFELEVBQUFHLFFBQUEsV0FFQUosRUFBQSxXQUFBQyxFQUFBRCxFQUFBLFFBUkEsQ0FTQ08sS0FBQSxTQUFBQyxHQUNELG1CQ1RBLElBQUFDLEtBR0EsU0FBQUMsRUFBQUMsR0FHQSxHQUFBRixFQUFBRSxHQUNBLE9BQUFGLEVBQUFFLEdBQUFULFFBR0EsSUFBQUMsRUFBQU0sRUFBQUUsSUFDQUMsRUFBQUQsRUFDQUUsR0FBQSxFQUNBWCxZQVVBLE9BTkFZLEVBQUFILEdBQUFJLEtBQUFaLEVBQUFELFFBQUFDLElBQUFELFFBQUFRLEdBR0FQLEVBQUFVLEdBQUEsRUFHQVYsRUFBQUQsUUEwREEsT0FyREFRLEVBQUFNLEVBQUFGLEVBR0FKLEVBQUFPLEVBQUFSLEVBR0FDLEVBQUFRLEVBQUEsU0FBQWhCLEVBQUFpQixFQUFBQyxHQUNBVixFQUFBVyxFQUFBbkIsRUFBQWlCLElBQ0FHLE9BQUFDLGVBQUFyQixFQUFBaUIsR0FBMENLLFlBQUEsRUFBQUMsSUFBQUwsS0FLMUNWLEVBQUFnQixFQUFBLFNBQUF4QixHQUNBLG9CQUFBeUIsZUFBQUMsYUFDQU4sT0FBQUMsZUFBQXJCLEVBQUF5QixPQUFBQyxhQUF3REMsTUFBQSxXQUV4RFAsT0FBQUMsZUFBQXJCLEVBQUEsY0FBaUQyQixPQUFBLEtBUWpEbkIsRUFBQW9CLEVBQUEsU0FBQUQsRUFBQUUsR0FFQSxHQURBLEVBQUFBLElBQUFGLEVBQUFu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QVV5RyxVQUFZLFNBQVNsRyxHQU94QyxJQUxFQSxFQURFQSxFQUNHQSxFQUFHbUcsdUJBRUgzSSxLQUFLbUUsU0FBUzRCLGNBQWMsNEJBRzVCdkQsR0FBSSxDQUNULElBQUtTLEVBQVNULEVBQUksYUFBbUMsUUFBcEJBLEVBQUc4QixNQUFNQyxRQUN4QyxPQUFPL0IsRUFFVEEsRUFBS0EsRUFBR21HLHVCQUdWLE9BQU8sTUFHVC9FLEVBQVczQixVQUFVNEYsaUJBQW1CLFNBQVNGLEdBQy9DLElBQUliLEVBQU85RyxLQUFLbUUsU0FBU2hCLFVBQVVDLFNBQVMsUUFDeENnQyxFQUFPdUMsRUFBRU8sT0FBTzVHLE1BR3BCLEdBQVksS0FGWjhELEVBQU9BLEVBQUt3RCxlQUdWNUksS0FBSzhELFFBQVFjLFFBQVEsU0FBU0MsR0FDNUJBLEVBQUtoQixRQUFRUyxNQUFNQyxRQUFVLFVBRTFCLEdBQUl1QyxFQUFNLENBQ2YsSUFBSStCLEVBQVcsSUFBSUMsT0FBTzFELEdBQzFCcEYsS0FBSzhELFFBQVFjLFFBQVEsU0FBU0MsR0FDNUIsSUFBSWtFLEVBQWFsRSxFQUFLbkIsS0FBSzBCLEtBQUt3RCxjQUM1QkksRUFBVUgsRUFBU0ksS0FBS0YsR0FDNUJsRSxFQUFLaEIsUUFBUVMsTUFBTUMsUUFBVXlFLEVBQVUsR0FBSyxTQUloRGhKLEtBQUttRSxTQUFTZSxpQkFBaUIsVUFBVU4sUUFBUSxTQUFTQyxHQUN4RHRCLEVBQVlzQixFQUFNLFdBSXBCeEIsRUFEY3JELEtBQUt1SSxVQUFVLE1BQ1gsMENDbmFwQjNJLEVBQUFELFFBQUFNIiwiZmlsZSI6ImpzL25pY2Utc2VsZWN0Mi5qcyIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbiB3ZWJwYWNrVW5pdmVyc2FsTW9kdWxlRGVmaW5pdGlvbihyb290LCBmYWN0b3J5KSB7XG5cdGlmKHR5cGVvZiBleHBvcnRzID09PSAnb2JqZWN0JyAmJiB0eXBlb2YgbW9kdWxlID09PSAnb2JqZWN0Jylcblx0XHRtb2R1bGUuZXhwb3J0cyA9IGZhY3RvcnkocmVxdWlyZShcIndpbmRvd1wiKSk7XG5cdGVsc2UgaWYodHlwZW9mIGRlZmluZSA9PT0gJ2Z1bmN0aW9uJyAmJiBkZWZpbmUuYW1kKVxuXHRcdGRlZmluZShbXCJ3aW5kb3dcIl0sIGZhY3RvcnkpO1xuXHRlbHNlIGlmKHR5cGVvZiBleHBvcnRzID09PSAnb2JqZWN0Jylcblx0XHRleHBvcnRzW1wiTmljZVNlbGVjdFwiXSA9IGZhY3RvcnkocmVxdWlyZShcIndpbmRvd1wiKSk7XG5cdGVsc2Vcblx0XHRyb290W1wiTmljZVNlbGVjdFwiXSA9IGZhY3Rvcnkocm9vdFtcIndpbmRvd1wiXSk7XG59KSh0aGlzLCBmdW5jdGlvbihfX1dFQlBBQ0tfRVhURVJOQUxfTU9EVUxFX18xX18pIHtcbnJldHVybiAiLCIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHsgZW51bWVyYWJsZTogdHJ1ZSwgZ2V0OiBnZXR0ZXIgfSk7XG4gXHRcdH1cbiBcdH07XG5cbiBcdC8vIGRlZmluZSBfX2VzTW9kdWxlIG9uIGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uciA9IGZ1bmN0aW9uKGV4cG9ydHMpIHtcbiBcdFx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG4gXHRcdH1cbiBcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbiBcdH07XG5cbiBcdC8vIGNyZWF0ZSBhIGZha2UgbmFtZXNwYWNlIG9iamVjdFxuIFx0Ly8gbW9kZSAmIDE6IHZhbHVlIGlzIGEgbW9kdWxlIGlkLCByZXF1aXJlIGl0XG4gXHQvLyBtb2RlICYgMjogbWVyZ2UgYWxsIHByb3BlcnRpZXMgb2YgdmFsdWUgaW50byB0aGUgbnNcbiBcdC8vIG1vZGUgJiA0OiByZXR1cm4gdmFsdWUgd2hlbiBhbHJlYWR5IG5zIG9iamVjdFxuIFx0Ly8gbW9kZSAmIDh8MTogYmVoYXZlIGxpa2UgcmVxdWlyZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy50ID0gZnVuY3Rpb24odmFsdWUsIG1vZGUpIHtcbiBcdFx0aWYobW9kZSAmIDEpIHZhbHVlID0gX193ZWJwYWNrX3JlcXVpcmVfXyh2YWx1ZSk7XG4gXHRcdGlmKG1vZGUgJiA4KSByZXR1cm4gdmFsdWU7XG4gXHRcdGlmKChtb2RlICYgNCkgJiYgdHlwZW9mIHZhbHVlID09PSAnb2JqZWN0JyAmJiB2YWx1ZSAmJiB2YWx1ZS5fX2VzTW9kdWxlKSByZXR1cm4gdmFsdWU7XG4gXHRcdHZhciBucyA9IE9iamVjdC5jcmVhdGUobnVsbCk7XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18ucihucyk7XG4gXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShucywgJ2RlZmF1bHQnLCB7IGVudW1lcmFibGU6IHRydWUsIHZhbHVlOiB2YWx1ZSB9KTtcbiBcdFx0aWYobW9kZSAmIDIgJiYgdHlwZW9mIHZhbHVlICE9ICdzdHJpbmcnKSBmb3IodmFyIGtleSBpbiB2YWx1ZSkgX193ZWJwYWNrX3JlcXVpcmVfXy5kKG5zLCBrZXksIGZ1bmN0aW9uKGtleSkgeyByZXR1cm4gdmFsdWVba2V5XTsgfS5iaW5kKG51bGwsIGtleSkpO1xuIFx0XHRyZXR1cm4gbnM7XG4gXHR9O1xuXG4gXHQvLyBnZXREZWZhdWx0RXhwb3J0IGZ1bmN0aW9uIGZvciBjb21wYXRpYmlsaXR5IHdpdGggbm9uLWhhcm1vbnkgbW9kdWxlc1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5uID0gZnVuY3Rpb24obW9kdWxlKSB7XG4gXHRcdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuIFx0XHRcdGZ1bmN0aW9uIGdldERlZmF1bHQoKSB7IHJldHVybiBtb2R1bGVbJ2RlZmF1bHQnXTsgfSA6XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0TW9kdWxlRXhwb3J0cygpIHsgcmV0dXJuIG1vZHVsZTsgfTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgJ2EnLCBnZXR0ZXIpO1xuIFx0XHRyZXR1cm4gZ2V0dGVyO1xuIFx0fTtcblxuIFx0Ly8gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSBmdW5jdGlvbihvYmplY3QsIHByb3BlcnR5KSB7IHJldHVybiBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqZWN0LCBwcm9wZXJ0eSk7IH07XG5cbiBcdC8vIF9fd2VicGFja19wdWJsaWNfcGF0aF9fXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnAgPSBcIi9cIjtcblxuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDApO1xuIiwiaW1wb3J0IFwiLi4vc2Nzcy9uaWNlLXNlbGVjdDIuc2Nzc1wiO1xuXG4vLyB1dGlsaXR5IGZ1bmN0aW9uc1xuZnVuY3Rpb24gdHJpZ2dlckNsaWNrKGVsKSB7XG4gIHZhciBldmVudCA9IGRvY3VtZW50LmNyZWF0ZUV2ZW50KFwiTW91c2VFdmVudHNcIik7XG4gIGV2ZW50LmluaXRFdmVudChcImNsaWNrXCIsIHRydWUsIGZhbHNlKTtcbiAgZWwuZGlzcGF0Y2hFdmVudChldmVudCk7XG59XG5cbmZ1bmN0aW9uIHRyaWdnZXJDaGFuZ2UoZWwpIHtcbiAgdmFyIGV2ZW50ID0gZG9jdW1lbnQuY3JlYXRlRXZlbnQoXCJIVE1MRXZlbnRzXCIpO1xuICBldmVudC5pbml0RXZlbnQoXCJjaGFuZ2VcIiwgdHJ1ZSwgZmFsc2UpO1xuICBlbC5kaXNwYXRjaEV2ZW50KGV2ZW50KTtcbn1cblxuZnVuY3Rpb24gYXR0cihlbCwga2V5KSB7XG4gIHJldHVybiBlbC5nZXRBdHRyaWJ1dGUoa2V5KTtcbn1cblxuZnVuY3Rpb24gZGF0YShlbCwga2V5KSB7XG4gIHJldHVybiBlbC5nZXRBdHRyaWJ1dGUoXCJkYXRhLVwiICsga2V5KTtcbn1cblxuZnVuY3Rpb24gaGFzQ2xhc3MoZWwsIGNsYXNzTmFtZSkge1xuICBpZiAoZWwpIHJldHVybiBlbC5jbGFzc0xpc3QuY29udGFpbnMoY2xhc3NOYW1lKTtcbiAgZWxzZSByZXR1cm4gZmFsc2U7XG59XG5cbmZ1bmN0aW9uIGFkZENsYXNzKGVsLCBjbGFzc05hbWUpIHtcbiAgaWYgKGVsKSByZXR1cm4gZWwuY2xhc3NMaXN0LmFkZChjbGFzc05hbWUpO1xufVxuXG5mdW5jdGlvbiByZW1vdmVDbGFzcyhlbCwgY2xhc3NOYW1lKSB7XG4gIGlmIChlbCkgcmV0dXJuIGVsLmNsYXNzTGlzdC5yZW1vdmUoY2xhc3NOYW1lKTtcbn1cblxudmFyIGRlZmF1bHRPcHRpb25zID0ge1xuICBkYXRhOiBudWxsLFxuICBzZWFyY2hhYmxlOiBmYWxzZVxufTtcbmZ1bmN0aW9uIE5pY2VTZWxlY3QoZWxlbWVudCwgb3B0aW9ucykge1xuICB0aGlzLmVsID0gZWxlbWVudDtcbiAgdGhpcy5jb25maWcgPSBPYmplY3QuYXNzaWduKHt9LCBkZWZhdWx0T3B0aW9ucywgb3B0aW9ucyB8fCB7fSk7XG5cbiAgdGhpcy5kYXRhID0gdGhpcy5jb25maWcuZGF0YTtcbiAgdGhpcy5zZWxlY3RlZE9wdGlvbnMgPSBbXTtcblxuICB0aGlzLnBsYWNlaG9sZGVyID1cbiAgICBhdHRyKHRoaXMuZWwsIFwicGxhY2Vob2xkZXJcIikgfHxcbiAgICB0aGlzLmNvbmZpZy5wbGFjZWhvbGRlciB8fFxuICAgIFwiU2VsZWN0IGFuIG9wdGlvblwiO1xuXG4gIHRoaXMuZHJvcGRvd24gPSBudWxsO1xuICB0aGlzLm11bHRpcGxlID0gYXR0cih0aGlzLmVsLCBcIm11bHRpcGxlXCIpO1xuICB0aGlzLmRpc2FibGVkID0gYXR0cih0aGlzLmVsLCBcImRpc2FibGVkXCIpO1xuXG4gIHRoaXMuY3JlYXRlKCk7XG59XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLmNyZWF0ZSA9IGZ1bmN0aW9uKCkge1xuICB0aGlzLmVsLnN0eWxlLmRpc3BsYXkgPSBcIm5vbmVcIjtcblxuICBpZiAodGhpcy5kYXRhKSB7XG4gICAgdGhpcy5wcm9jZXNzRGF0YSh0aGlzLmRhdGEpO1xuICB9IGVsc2Uge1xuICAgIHRoaXMuZXh0cmFjdERhdGEoKTtcbiAgfVxuXG4gIHRoaXMucmVuZGVyRHJvcGRvd24oKTtcbiAgdGhpcy5iaW5kRXZlbnQoKTtcbn07XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLnByb2Nlc3NEYXRhID0gZnVuY3Rpb24oZGF0YSkge1xuICB2YXIgb3B0aW9ucyA9IFtdO1xuICBkYXRhLmZvckVhY2goZnVuY3Rpb24oaXRlbSkge1xuICAgIG9wdGlvbnMucHVzaCh7XG4gICAgICBkYXRhOiBpdGVtLFxuICAgICAgYXR0cmlidXRlczoge1xuICAgICAgICBzZWxlY3RlZDogZmFsc2UsXG4gICAgICAgIGRpc2FibGVkOiBmYWxzZVxuICAgICAgfVxuICAgIH0pO1xuICB9KTtcbiAgdGhpcy5vcHRpb25zID0gb3B0aW9ucztcbn07XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLmV4dHJhY3REYXRhID0gZnVuY3Rpb24oKSB7XG4gIHZhciBvcHRpb25zID0gdGhpcy5lbC5xdWVyeVNlbGVjdG9yQWxsKFwib3B0aW9uXCIpO1xuICB2YXIgZGF0YSA9IFtdO1xuICB2YXIgYWxsT3B0aW9ucyA9IFtdO1xuICB2YXIgc2VsZWN0ZWRPcHRpb25zID0gW107XG5cbiAgb3B0aW9ucy5mb3JFYWNoKGl0ZW0gPT4ge1xuICAgIHZhciBpdGVtRGF0YSA9IHtcbiAgICAgIHRleHQ6IGl0ZW0uaW5uZXJUZXh0LFxuICAgICAgdmFsdWU6IGl0ZW0udmFsdWVcbiAgICB9O1xuXG4gICAgdmFyIGF0dHJpYnV0ZXMgPSB7XG4gICAgICBzZWxlY3RlZDogaXRlbS5nZXRBdHRyaWJ1dGUoXCJzZWxlY3RlZFwiKSAhPSBudWxsLFxuICAgICAgZGlzYWJsZWQ6IGl0ZW0uZ2V0QXR0cmlidXRlKFwiZGlzYWJsZWRcIikgIT0gbnVsbFxuICAgIH07XG5cbiAgICBkYXRhLnB1c2goaXRlbURhdGEpO1xuICAgIGFsbE9wdGlvbnMucHVzaCh7IGRhdGE6IGl0ZW1EYXRhLCBhdHRyaWJ1dGVzOiBhdHRyaWJ1dGVzIH0pO1xuICB9KTtcblxuICB0aGlzLmRhdGEgPSBkYXRhO1xuICB0aGlzLm9wdGlvbnMgPSBhbGxPcHRpb25zO1xuICB0aGlzLm9wdGlvbnMuZm9yRWFjaChmdW5jdGlvbihpdGVtKSB7XG4gICAgaWYgKGl0ZW0uYXR0cmlidXRlcy5zZWxlY3RlZCkgc2VsZWN0ZWRPcHRpb25zLnB1c2goaXRlbSk7XG4gIH0pO1xuXG4gIHRoaXMuc2VsZWN0ZWRPcHRpb25zID0gc2VsZWN0ZWRPcHRpb25zO1xufTtcblxuTmljZVNlbGVjdC5wcm90b3R5cGUucmVuZGVyRHJvcGRvd24gPSBmdW5jdGlvbigpIHtcbiAgdmFyIGNsYXNzZXMgPSBbXG4gICAgXCJuaWNlLXNlbGVjdFwiLFxuICAgIGF0dHIodGhpcy5lbCwgXCJjbGFzc1wiKSB8fCBcIlwiLFxuICAgIHRoaXMuZGlzYWJsZWQgPyBcImRpc2FibGVkXCIgOiBcIlwiLFxuICAgIHRoaXMubXVsdGlwbGUgPyBcImhhcy1tdWx0aXBsZVwiIDogXCJcIlxuICBdO1xuXG4gIGxldCBzZWFyY2hIdG1sID0gYDxkaXYgY2xhc3M9XCJuaWNlLXNlbGVjdC1zZWFyY2gtYm94XCI+XG48aW5wdXQgdHlwZT1cInRleHRcIiBjbGFzcz1cIm5pY2Utc2VsZWN0LXNlYXJjaFwiIHBsYWNlaG9sZGVyPVwiU2VhcmNoLi4uXCIvPlxuPC9kaXY+YDtcblxuICB2YXIgaHRtbCA9IGA8ZGl2IGNsYXNzPVwiJHtjbGFzc2VzLmpvaW4oXCIgXCIpfVwiIHRhYmluZGV4PVwiJHtcbiAgICB0aGlzLmRpc2FibGVkID8gbnVsbCA6IDBcbiAgfVwiPlxuICA8c3BhbiBjbGFzcz1cIiR7dGhpcy5tdWx0aXBsZSA/IFwibXVsdGlwbGUtb3B0aW9uc1wiIDogXCJjdXJyZW50XCJ9XCI+PC9zcGFuPlxuICA8ZGl2IGNsYXNzPVwibmljZS1zZWxlY3QtZHJvcGRvd25cIj5cbiAgJHt0aGlzLmNvbmZpZy5zZWFyY2hhYmxlID8gc2VhcmNoSHRtbCA6IFwiXCJ9XG4gIDx1bCBjbGFzcz1cImxpc3RcIj48L3VsPlxuICA8L2Rpdj48L2Rpdj5cbmA7XG5cbiAgdGhpcy5lbC5pbnNlcnRBZGphY2VudEhUTUwoXCJhZnRlcmVuZFwiLCBodG1sKTtcblxuICB0aGlzLmRyb3Bkb3duID0gdGhpcy5lbC5uZXh0RWxlbWVudFNpYmxpbmc7XG4gIHRoaXMuX3JlbmRlclNlbGVjdGVkSXRlbXMoKTtcbiAgdGhpcy5fcmVuZGVySXRlbXMoKTtcbn07XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLl9yZW5kZXJTZWxlY3RlZEl0ZW1zID0gZnVuY3Rpb24oKSB7XG4gIGlmICh0aGlzLm11bHRpcGxlKSB7XG4gICAgdmFyIHNlbGVjdGVkSHRtbCA9IFwiXCI7XG5cbiAgICB0aGlzLnNlbGVjdGVkT3B0aW9ucy5mb3JFYWNoKGZ1bmN0aW9uKGl0ZW0pIHtcbiAgICAgIHNlbGVjdGVkSHRtbCArPSBgPHNwYW4gY2xhc3M9XCJjdXJyZW50XCI+JHtpdGVtLmRhdGEudGV4dH08L3NwYW4+YDtcbiAgICB9KTtcbiAgICBzZWxlY3RlZEh0bWwgPSBzZWxlY3RlZEh0bWwgPT0gXCJcIiA/IHRoaXMucGxhY2Vob2xkZXIgOiBzZWxlY3RlZEh0bWw7XG5cbiAgICB0aGlzLmRyb3Bkb3duLnF1ZXJ5U2VsZWN0b3IoXCIubXVsdGlwbGUtb3B0aW9uc1wiKS5pbm5lckhUTUwgPSBzZWxlY3RlZEh0bWw7XG4gIH0gZWxzZSB7XG4gICAgdmFyIGh0bWwgPVxuICAgICAgdGhpcy5zZWxlY3RlZE9wdGlvbnMubGVuZ3RoID4gMFxuICAgICAgICA/IHRoaXMuc2VsZWN0ZWRPcHRpb25zWzBdLmRhdGEudGV4dFxuICAgICAgICA6IHRoaXMucGxhY2Vob2xkZXI7XG5cbiAgICB0aGlzLmRyb3Bkb3duLnF1ZXJ5U2VsZWN0b3IoXCIuY3VycmVudFwiKS5pbm5lckhUTUwgPSBodG1sO1xuICB9XG59O1xuXG5OaWNlU2VsZWN0LnByb3RvdHlwZS5fcmVuZGVySXRlbXMgPSBmdW5jdGlvbigpIHtcbiAgdmFyIHVsID0gdGhpcy5kcm9wZG93bi5xdWVyeVNlbGVjdG9yKFwidWxcIik7XG4gIHRoaXMub3B0aW9ucy5mb3JFYWNoKGl0ZW0gPT4ge1xuICAgIHVsLmFwcGVuZENoaWxkKHRoaXMuX3JlbmRlckl0ZW0oaXRlbSkpO1xuICB9KTtcbn07XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLl9yZW5kZXJJdGVtID0gZnVuY3Rpb24ob3B0aW9uKSB7XG4gIHZhciBlbCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJsaVwiKTtcbiAgZWwuc2V0QXR0cmlidXRlKFwiZGF0YS12YWx1ZVwiLCBvcHRpb24uZGF0YS52YWx1ZSk7XG5cbiAgdmFyIGNsYXNzTGlzdCA9IFtcbiAgICBcIm9wdGlvblwiLFxuICAgIG9wdGlvbi5hdHRyaWJ1dGVzLnNlbGVjdGVkID8gXCJzZWxlY3RlZFwiIDogbnVsbCxcbiAgICBvcHRpb24uYXR0cmlidXRlcy5kaXNhYmxlZCA/IFwiZGlzYWJsZWRcIiA6IG51bGxcbiAgXTtcblxuICBlbC5jbGFzc0xpc3QuYWRkKC4uLmNsYXNzTGlzdCk7XG4gIGVsLmlubmVySFRNTCA9IG9wdGlvbi5kYXRhLnRleHQ7XG4gIGVsLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCB0aGlzLl9vbkl0ZW1DbGlja2VkLmJpbmQodGhpcywgb3B0aW9uKSk7XG4gIG9wdGlvbi5lbGVtZW50ID0gZWw7XG4gIHJldHVybiBlbDtcbn07XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLnVwZGF0ZSA9IGZ1bmN0aW9uKCkge1xuICB0aGlzLmV4dHJhY3REYXRhKCk7XG4gIGlmICh0aGlzLmRyb3Bkb3duKSB7XG4gICAgdmFyIG9wZW4gPSBoYXNDbGFzcyh0aGlzLmRyb3Bkb3duLCBcIm9wZW5cIik7XG4gICAgdGhpcy5kcm9wZG93bi5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHRoaXMuZHJvcGRvd24pO1xuICAgIHRoaXMuY3JlYXRlKCk7XG5cbiAgICBpZiAob3Blbikge1xuICAgICAgdHJpZ2dlckNsaWNrKHRoaXMuZHJvcGRvd24pO1xuICAgIH1cbiAgfVxufTtcblxuTmljZVNlbGVjdC5wcm90b3R5cGUuZGlzYWJsZSA9IGZ1bmN0aW9uKCkge1xuICBpZiAoIXRoaXMuZGlzYWJsZWQpIHtcbiAgICB0aGlzLmRpc2FibGVkID0gdHJ1ZTtcbiAgICBhZGRDbGFzcyh0aGlzLmRyb3Bkb3duLCBcImRpc2FibGVkXCIpO1xuICB9XG59O1xuXG5OaWNlU2VsZWN0LnByb3RvdHlwZS5lbmFibGUgPSBmdW5jdGlvbigpIHtcbiAgaWYgKHRoaXMuZGlzYWJsZWQpIHtcbiAgICB0aGlzLmRpc2FibGVkID0gZmFsc2U7XG4gICAgcmVtb3ZlQ2xhc3ModGhpcy5kcm9wZG93biwgXCJkaXNhYmxlZFwiKTtcbiAgfVxufTtcblxuTmljZVNlbGVjdC5wcm90b3R5cGUuY2xlYXIgPSBmdW5jdGlvbigpIHtcbiAgdGhpcy5zZWxlY3RlZE9wdGlvbnMgPSBbXTtcbiAgdGhpcy5fcmVuZGVyU2VsZWN0ZWRJdGVtcygpO1xuICB0aGlzLnVwZGF0ZVNlbGVjdFZhbHVlKCk7XG4gIHRyaWdnZXJDaGFuZ2UodGhpcy5lbCk7XG59O1xuXG5OaWNlU2VsZWN0LnByb3RvdHlwZS5kZXN0cm95ID0gZnVuY3Rpb24oKSB7XG4gIGlmICh0aGlzLmRyb3Bkb3duKSB7XG4gICAgdGhpcy5kcm9wZG93bi5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHRoaXMuZHJvcGRvd24pO1xuICAgIHRoaXMuZWwuc3R5bGUuZGlzcGxheSA9IFwiXCI7XG4gIH1cbn07XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLmJpbmRFdmVudCA9IGZ1bmN0aW9uKCkge1xuICB2YXIgJHRoaXMgPSB0aGlzO1xuICB0aGlzLmRyb3Bkb3duLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCB0aGlzLl9vbkNsaWNrZWQuYmluZCh0aGlzKSk7XG4gIHRoaXMuZHJvcGRvd24uYWRkRXZlbnRMaXN0ZW5lcihcImtleWRvd25cIiwgdGhpcy5fb25LZXlQcmVzc2VkLmJpbmQodGhpcykpO1xuICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIHRoaXMuX29uQ2xpY2tlZE91dHNpZGUuYmluZCh0aGlzKSk7XG5cbiAgaWYgKHRoaXMuY29uZmlnLnNlYXJjaGFibGUpIHtcbiAgICB0aGlzLl9iaW5kU2VhcmNoRXZlbnQoKTtcbiAgfVxufTtcblxuTmljZVNlbGVjdC5wcm90b3R5cGUuX2JpbmRTZWFyY2hFdmVudCA9IGZ1bmN0aW9uKCkge1xuICB2YXIgc2VhcmNoQm94ID0gdGhpcy5kcm9wZG93bi5xdWVyeVNlbGVjdG9yKFwiLm5pY2Utc2VsZWN0LXNlYXJjaFwiKTtcbiAgaWYgKHNlYXJjaEJveClcbiAgICBzZWFyY2hCb3guYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uKGUpIHtcbiAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG4gICAgICByZXR1cm4gZmFsc2U7XG4gICAgfSk7XG5cbiAgc2VhcmNoQm94LmFkZEV2ZW50TGlzdGVuZXIoXCJpbnB1dFwiLCB0aGlzLl9vblNlYXJjaENoYW5nZWQuYmluZCh0aGlzKSk7XG59O1xuXG5OaWNlU2VsZWN0LnByb3RvdHlwZS5fb25DbGlja2VkID0gZnVuY3Rpb24oZSkge1xuICB0aGlzLmRyb3Bkb3duLmNsYXNzTGlzdC50b2dnbGUoXCJvcGVuXCIpO1xuXG4gIGlmICh0aGlzLmRyb3Bkb3duLmNsYXNzTGlzdC5jb250YWlucyhcIm9wZW5cIikpIHtcbiAgICB2YXIgc2VhcmNoID0gdGhpcy5kcm9wZG93bi5xdWVyeVNlbGVjdG9yKFwiLm5pY2Utc2VsZWN0LXNlYXJjaFwiKTtcbiAgICBpZiAoc2VhcmNoKSB7XG4gICAgICBzZWFyY2gudmFsdWUgPSBcIlwiO1xuICAgICAgc2VhcmNoLmZvY3VzKCk7XG4gICAgfVxuXG4gICAgdmFyIHQgPSB0aGlzLmRyb3Bkb3duLnF1ZXJ5U2VsZWN0b3IoXCIuZm9jdXNcIik7XG4gICAgcmVtb3ZlQ2xhc3ModCwgXCJmb2N1c1wiKTtcbiAgICB0ID0gdGhpcy5kcm9wZG93bi5xdWVyeVNlbGVjdG9yKFwiLnNlbGVjdGVkXCIpO1xuICAgIGFkZENsYXNzKHQsIFwiZm9jdXNcIik7XG4gICAgdGhpcy5kcm9wZG93bi5xdWVyeVNlbGVjdG9yQWxsKFwidWwgbGlcIikuZm9yRWFjaChmdW5jdGlvbihpdGVtKSB7XG4gICAgICBpdGVtLnN0eWxlLmRpc3BsYXkgPSBcIlwiO1xuICAgIH0pO1xuICB9IGVsc2Uge1xuICAgIHRoaXMuZHJvcGRvd24uZm9jdXMoKTtcbiAgfVxufTtcblxuTmljZVNlbGVjdC5wcm90b3R5cGUuX29uSXRlbUNsaWNrZWQgPSBmdW5jdGlvbihvcHRpb24sIGUpIHtcbiAgdmFyIG9wdGlvbkVsID0gZS50YXJnZXQ7XG5cbiAgaWYgKCFoYXNDbGFzcyhvcHRpb25FbCwgXCJkaXNhYmxlZFwiKSkge1xuICAgIGlmICh0aGlzLm11bHRpcGxlKSB7XG4gICAgICBpZiAoIWhhc0NsYXNzKG9wdGlvbkVsLCBcInNlbGVjdGVkXCIpKSB7XG4gICAgICAgIGFkZENsYXNzKG9wdGlvbkVsLCBcInNlbGVjdGVkXCIpO1xuICAgICAgICB0aGlzLnNlbGVjdGVkT3B0aW9ucy5wdXNoKG9wdGlvbik7XG4gICAgICB9XG4gICAgfSBlbHNlIHtcbiAgICAgIHRoaXMuc2VsZWN0ZWRPcHRpb25zLmZvckVhY2goZnVuY3Rpb24oaXRlbSkge1xuICAgICAgICByZW1vdmVDbGFzcyhpdGVtLmVsZW1lbnQsIFwic2VsZWN0ZWRcIik7XG4gICAgICB9KTtcblxuICAgICAgYWRkQ2xhc3Mob3B0aW9uRWwsIFwic2VsZWN0ZWRcIik7XG4gICAgICB0aGlzLnNlbGVjdGVkT3B0aW9ucyA9IFtvcHRpb25dO1xuICAgIH1cblxuICAgIHRoaXMuX3JlbmRlclNlbGVjdGVkSXRlbXMoKTtcbiAgICB0aGlzLnVwZGF0ZVNlbGVjdFZhbHVlKCk7XG4gIH1cbn07XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLnVwZGF0ZVNlbGVjdFZhbHVlID0gZnVuY3Rpb24oKSB7XG4gIGlmICh0aGlzLm11bHRpcGxlKSB7XG4gICAgdGhpcy5zZWxlY3RlZE9wdGlvbnMuZWFjaChmdW5jdGlvbihpdGVtKSB7XG4gICAgICB2YXIgZWwgPSB0aGlzLmVsLnF1ZXJ5U2VsZWN0b3IoJ29wdGlvblt2YWx1ZT1cIicgKyBpdGVtLmRhdGEudmFsdWUgKyAnXCJdJyk7XG4gICAgICBpZiAoZWwpIGVsLnNldEF0dHJpYnV0ZShcInNlbGVjdGVkXCIsIHRydWUpO1xuICAgIH0pO1xuICB9IGVsc2UgaWYgKHRoaXMuc2VsZWN0ZWRPcHRpb25zLmxlbmd0aCA+IDApIHtcbiAgICB0aGlzLmVsLnZhbHVlID0gdGhpcy5zZWxlY3RlZE9wdGlvbnNbMF0uZGF0YS52YWx1ZTtcbiAgfVxuICB0cmlnZ2VyQ2hhbmdlKHRoaXMuZWwpO1xufTtcblxuTmljZVNlbGVjdC5wcm90b3R5cGUuX29uQ2xpY2tlZE91dHNpZGUgPSBmdW5jdGlvbihlKSB7XG4gIGlmICghdGhpcy5kcm9wZG93bi5jb250YWlucyhlLnRhcmdldCkpIHtcbiAgICB0aGlzLmRyb3Bkb3duLmNsYXNzTGlzdC5yZW1vdmUoXCJvcGVuXCIpO1xuICB9XG59O1xuXG5OaWNlU2VsZWN0LnByb3RvdHlwZS5fb25LZXlQcmVzc2VkID0gZnVuY3Rpb24oZSkge1xuICAvLyBLZXlib2FyZCBldmVudHNcblxuICB2YXIgZm9jdXNlZE9wdGlvbiA9IHRoaXMuZHJvcGRvd24ucXVlcnlTZWxlY3RvcihcIi5mb2N1c1wiKTtcblxuICB2YXIgb3BlbiA9IHRoaXMuZHJvcGRvd24uY2xhc3NMaXN0LmNvbnRhaW5zKFwib3BlblwiKTtcblxuICAvLyBTcGFjZSBvciBFbnRlclxuICBpZiAoZS5rZXlDb2RlID09IDMyIHx8IGUua2V5Q29kZSA9PSAxMykge1xuICAgIGlmIChvcGVuKSB7XG4gICAgICB0cmlnZ2VyQ2xpY2soZm9jdXNlZE9wdGlvbik7XG4gICAgfSBlbHNlIHtcbiAgICAgIHRyaWdnZXJDbGljayh0aGlzLmRyb3Bkb3duKTtcbiAgICB9XG4gIH0gZWxzZSBpZiAoZS5rZXlDb2RlID09IDQwKSB7XG4gICAgLy8gRG93blxuICAgIGlmICghb3Blbikge1xuICAgICAgdHJpZ2dlckNsaWNrKHRoaXMuZHJvcGRvd24pO1xuICAgIH0gZWxzZSB7XG4gICAgICB2YXIgbmV4dCA9IHRoaXMuX2ZpbmROZXh0KGZvY3VzZWRPcHRpb24pO1xuICAgICAgaWYgKG5leHQpIHtcbiAgICAgICAgdmFyIHQgPSB0aGlzLmRyb3Bkb3duLnF1ZXJ5U2VsZWN0b3IoXCIuZm9jdXNcIik7XG4gICAgICAgIHJlbW92ZUNsYXNzKHQsIFwiZm9jdXNcIik7XG4gICAgICAgIGFkZENsYXNzKG5leHQsIFwiZm9jdXNcIik7XG4gICAgICB9XG4gICAgfVxuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT0gMzgpIHtcbiAgICAvLyBVcFxuICAgIGlmICghb3Blbikge1xuICAgICAgdHJpZ2dlckNsaWNrKHRoaXMuZHJvcGRvd24pO1xuICAgIH0gZWxzZSB7XG4gICAgICB2YXIgcHJldiA9IHRoaXMuX2ZpbmRQcmV2KGZvY3VzZWRPcHRpb24pO1xuICAgICAgaWYgKHByZXYpIHtcbiAgICAgICAgdmFyIHQgPSB0aGlzLmRyb3Bkb3duLnF1ZXJ5U2VsZWN0b3IoXCIuZm9jdXNcIik7XG4gICAgICAgIHJlbW92ZUNsYXNzKHQsIFwiZm9jdXNcIik7XG4gICAgICAgIGFkZENsYXNzKHByZXYsIFwiZm9jdXNcIik7XG4gICAgICB9XG4gICAgfVxuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT0gMjcgJiYgb3Blbikge1xuICAgIC8vIEVzY1xuICAgIHRyaWdnZXJDbGljayh0aGlzLmRyb3Bkb3duKTtcbiAgfVxuICByZXR1cm4gZmFsc2U7XG59O1xuXG5OaWNlU2VsZWN0LnByb3RvdHlwZS5fZmluZE5leHQgPSBmdW5jdGlvbihlbCkge1xuICBpZiAoZWwpIHtcbiAgICBlbCA9IGVsLm5leHRFbGVtZW50U2libGluZztcbiAgfSBlbHNlIHtcbiAgICBlbCA9IHRoaXMuZHJvcGRvd24ucXVlcnlTZWxlY3RvcihcIi5saXN0IC5vcHRpb25cIik7XG4gIH1cblxuICB3aGlsZSAoZWwpIHtcbiAgICBpZiAoIWhhc0NsYXNzKGVsLCBcImRpc2FibGVkXCIpICYmIGVsLnN0eWxlLmRpc3BsYXkgIT0gXCJub25lXCIpIHtcbiAgICAgIHJldHVybiBlbDtcbiAgICB9XG4gICAgZWwgPSBlbC5uZXh0RWxlbWVudFNpYmxpbmc7XG4gIH1cblxuICByZXR1cm4gbnVsbDtcbn07XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLl9maW5kUHJldiA9IGZ1bmN0aW9uKGVsKSB7XG4gIGlmIChlbCkge1xuICAgIGVsID0gZWwucHJldmlvdXNFbGVtZW50U2libGluZztcbiAgfSBlbHNlIHtcbiAgICBlbCA9IHRoaXMuZHJvcGRvd24ucXVlcnlTZWxlY3RvcihcIi5saXN0IC5vcHRpb246bGFzdC1jaGlsZFwiKTtcbiAgfVxuXG4gIHdoaWxlIChlbCkge1xuICAgIGlmICghaGFzQ2xhc3MoZWwsIFwiZGlzYWJsZWRcIikgJiYgZWwuc3R5bGUuZGlzcGxheSAhPSBcIm5vbmVcIikge1xuICAgICAgcmV0dXJuIGVsO1xuICAgIH1cbiAgICBlbCA9IGVsLnByZXZpb3VzRWxlbWVudFNpYmxpbmc7XG4gIH1cblxuICByZXR1cm4gbnVsbDtcbn07XG5cbk5pY2VTZWxlY3QucHJvdG90eXBlLl9vblNlYXJjaENoYW5nZWQgPSBmdW5jdGlvbihlKSB7XG4gIHZhciBvcGVuID0gdGhpcy5kcm9wZG93bi5jbGFzc0xpc3QuY29udGFpbnMoXCJvcGVuXCIpO1xuICB2YXIgdGV4dCA9IGUudGFyZ2V0LnZhbHVlO1xuICB0ZXh0ID0gdGV4dC50b0xvd2VyQ2FzZSgpO1xuXG4gIGlmICh0ZXh0ID09IFwiXCIpIHtcbiAgICB0aGlzLm9wdGlvbnMuZm9yRWFjaChmdW5jdGlvbihpdGVtKSB7XG4gICAgICBpdGVtLmVsZW1lbnQuc3R5bGUuZGlzcGxheSA9IFwiXCI7XG4gICAgfSk7XG4gIH0gZWxzZSBpZiAob3Blbikge1xuICAgIHZhciBtYXRjaFJlZyA9IG5ldyBSZWdFeHAodGV4dCk7XG4gICAgdGhpcy5vcHRpb25zLmZvckVhY2goZnVuY3Rpb24oaXRlbSkge1xuICAgICAgdmFyIG9wdGlvblRleHQgPSBpdGVtLmRhdGEudGV4dC50b0xvd2VyQ2FzZSgpO1xuICAgICAgdmFyIG1hdGNoZWQgPSBtYXRjaFJlZy50ZXN0KG9wdGlvblRleHQpO1xuICAgICAgaXRlbS5lbGVtZW50LnN0eWxlLmRpc3BsYXkgPSBtYXRjaGVkID8gXCJcIiA6IFwibm9uZVwiO1xuICAgIH0pO1xuICB9XG5cbiAgdGhpcy5kcm9wZG93bi5xdWVyeVNlbGVjdG9yQWxsKFwiLmZvY3VzXCIpLmZvckVhY2goZnVuY3Rpb24oaXRlbSkge1xuICAgIHJlbW92ZUNsYXNzKGl0ZW0sIFwiZm9jdXNcIik7XG4gIH0pO1xuXG4gIHZhciBmaXJzdEVsID0gdGhpcy5fZmluZE5leHQobnVsbCk7XG4gIGFkZENsYXNzKGZpcnN0RWwsIFwiZm9jdXNcIik7XG59O1xuXG5leHBvcnQgZnVuY3Rpb24gYmluZChlbCwgb3B0aW9ucykge1xuICByZXR1cm4gbmV3IE5pY2VTZWxlY3QoZWwsIG9wdGlvbnMpO1xufVxuIiwibW9kdWxlLmV4cG9ydHMgPSBfX1dFQlBBQ0tfRVhURVJOQUxfTU9EVUxFX18xX187Il0sInNvdXJjZVJvb3QiOiIifQ==
