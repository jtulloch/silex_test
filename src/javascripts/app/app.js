define([
  "dojo/_base/declare",
  "dojo/_base/lang",
  "dojo/_base/array",
  "dojo/request/xhr"
], function( declare, lang, array, xhr ) {
    return {
      run: function() {
        this.makePracticeInfoRequest();
      },

      makePracticeInfoRequest: function() {
        xhr.get("practice_info",{
          handleAs: 'json'
        }).then(
          lang.hitch(this,'_onSuccess'),
          lang.hitch(this,'_onError')
        );
      },

      makeProfileRequest: function() {
        xhr.get("profile",{
          handleAs: 'json'
        }).then(
          lang.hitch(this,'_onSuccess'),
          lang.hitch(this,'_onError')
        );
      },

      _onSuccess: function(response) {
        console.log("request complete",response);
      },

      _onError: function(response) {
        console.log("error",arguments);
      }
    };
});

