package com.example.trana.cuahangthietbionline.activity;

import android.app.Dialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.trana.cuahangthietbionline.R;
import com.example.trana.cuahangthietbionline.adapter.GioHangAdapter;
import com.example.trana.cuahangthietbionline.ultil.CheckConnection;
import com.example.trana.cuahangthietbionline.ultil.Server;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.DecimalFormat;
import java.util.HashMap;
import java.util.Map;

public class GioHang extends AppCompatActivity {
    private ListView lvgiohang;
    private TextView txtthongbao;
    public static TextView txttongtien;
    public  static EditText edtdc;
    private static long tongtien=0;
    private Button btnthanhtoan,btntieptucmua;
    private Toolbar toolbargiohang;
    private GioHangAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_gio_hang);
        Anhxa();
        Actiontoolbar();
        CheckData();
        EventUtil();
        CatchOnItemListView();
        EventButton();
        btnthanhtoan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DialogDiaChi();

            }
        });
    }
    public void EventThanhToan(){

        AlertDialog.Builder builder=new AlertDialog.Builder(GioHang.this);
        builder.setTitle("Xác Nhận Thanh Toán Sản Phẩm");
        builder.setMessage("Bạn Có chắc Muốn Đặt Giỏ Hàng Này ");
        builder.setPositiveButton("có", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                    final RequestQueue requestQueue=Volley.newRequestQueue(getApplicationContext());
                    StringRequest stringRequest=new StringRequest(Request.Method.POST, Server.duongdandonhang, new Response.Listener<String>() {
                        @Override
                        public void onResponse(final String madonhang) {
                            Log.d("mahoadon",madonhang);
                            if(Integer.parseInt(madonhang)>0){
                                RequestQueue queue=Volley.newRequestQueue(getApplicationContext());
                                StringRequest  stringRequest1=new StringRequest(Request.Method.POST, Server.duongchitiecdonhang, new Response.Listener<String>() {
                                    @Override
                                    public void onResponse(String response) {
                                        Log.d("machitiec",response);
                                        if(response.equals("success")){
                                            MainActivity.manggiohang.clear();
                                            CheckConnection.ShowToast_short(getApplicationContext(),"Bạn đã thêm giỏ hàng thành công");
                                            startActivity(new Intent(getApplicationContext(),MainActivity.class));
                                            CheckConnection.ShowToast_short(getApplicationContext(),"Mời bạn tiếp tục mua sản phẩm");
                                        }else{
                                            CheckConnection.ShowToast_short(getApplicationContext(),"dữ liệu của bạn đã bị lỗi");
                                        }
                                    }
                                }, new Response.ErrorListener() {
                                    @Override
                                    public void onErrorResponse(VolleyError error) {

                                    }
                                }){
                                    @Override
                                    protected Map<String, String> getParams() throws AuthFailureError {
                                        JSONArray jsonArray=new JSONArray();

                                        for(int i=0;i<MainActivity.manggiohang.size();i++){
                                            JSONObject object=new JSONObject();
                                            try {
                                                object.put("madonhang",madonhang);
                                                object.put("masanpham",MainActivity.manggiohang.get(i).getIdsp());
                                                object.put("soluongsanpham",MainActivity.manggiohang.get(i).getSoluongsp());
                                                object.put("tientungsanpham",MainActivity.manggiohang.get(i).getGiasp());
                                            } catch (JSONException e) {
                                                e.printStackTrace();
                                            }
                                            jsonArray.put(object);

                                        }
                                        HashMap<String,String> hashMap=new HashMap<String, String>();
                                        hashMap.put("json",jsonArray.toString());
                                        return hashMap;
                                    }
                                };
                                queue.add(stringRequest1);
                            }
                        }
                    }, new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {

                        }
                    }){
                        @Override
                        protected Map<String, String> getParams() throws AuthFailureError {
                            HashMap<String,String> hashMap=new HashMap<String,String>();
                            hashMap.put("idkhachhang",String.valueOf(DangNhapActivity.id));
                            hashMap.put("tongtien",String.valueOf(tongtien));
                            return hashMap;
                        }
                    };
                    requestQueue.add(stringRequest);


            }
        });
        builder.setNegativeButton("Không ", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
              startActivity(new Intent(getApplicationContext(),GioHang.class));
            }
        });
        builder.show();

    }

    private void EventButton() {
        btntieptucmua.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getApplicationContext(),MainActivity.class));
            }
        });

    }

    private void CatchOnItemListView() {
        lvgiohang.setOnItemLongClickListener(new AdapterView.OnItemLongClickListener() {
            @Override
            public boolean onItemLongClick(AdapterView<?> parent, View view, final int position, long id) {
                AlertDialog.Builder builder=new AlertDialog.Builder(GioHang.this);
                builder.setTitle("Xác Nhận xóa sản phẩm");
                builder.setMessage("Bạn có chắc xóa sản phẩm này ");
                builder.setPositiveButton("có", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        if(MainActivity.manggiohang.size()<=0){
                            txtthongbao.setVisibility(View.VISIBLE);
                        }else{
                            MainActivity.manggiohang.remove(position);
                            adapter.notifyDataSetChanged();
                            EventUtil();
                            if(MainActivity.manggiohang.size()<=0){
                                txtthongbao.setVisibility(View.VISIBLE);
                            }else{
                                txtthongbao.setVisibility(View.INVISIBLE);
                                adapter.notifyDataSetChanged();
                                EventUtil();
                            }

                        }
                    }
                });
                builder.setNegativeButton("Không ", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        adapter.notifyDataSetChanged();
                        EventUtil();
                    }
                });
                builder.show();
                return true;
            }
        });
    }

    public static void EventUtil() {
        tongtien=0;
        for(int i=0;i<MainActivity.manggiohang.size();i++){
            tongtien+=MainActivity.manggiohang.get(i).getGiasp();
        }
        DecimalFormat decimalFormat = new DecimalFormat("###,###,###");
        txttongtien.setText("Gía : "+decimalFormat.format(tongtien)+" đ");
    }

    private void CheckData() {
        if(MainActivity.manggiohang.size() <= 0){
            adapter.notifyDataSetChanged();
            txtthongbao.setVisibility(View.VISIBLE);
            lvgiohang.setVisibility(View.INVISIBLE);
        }else{
            adapter.notifyDataSetChanged();
            txtthongbao.setVisibility(View.INVISIBLE);
            lvgiohang.setVisibility(View.VISIBLE);
        }
    }

    private void Actiontoolbar() {
        setSupportActionBar(toolbargiohang);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        toolbargiohang.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }
    private void DialogDiaChi(){
        final Dialog dialog=new Dialog(this);
        dialog.setContentView(R.layout.dialog_diachi);
        edtdc=(EditText)dialog.findViewById(R.id.edittextdialogdiachi);
        Button bttxacnhan=(Button) dialog.findViewById(R.id.dialogxacnhan);
        Button bttthoat=(Button) dialog.findViewById(R.id.dialogthoat);
        laydiachi();
        bttxacnhan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                capnhapdiachi();
                EventThanhToan();
            }
        });
        bttthoat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                dialog.dismiss();
            }
        });
        dialog.show();

    }
    private void laydiachi(){
        RequestQueue requestQueue=Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest=new StringRequest(Request.Method.POST, Server.laydiachi, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                edtdc.setText(response);

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> param=new HashMap<String, String>();
                param.put("MaTaiKhoan",String.valueOf(DangNhapActivity.id));
                return param;
            }
        };
        requestQueue.add(stringRequest);

    }
    private void capnhapdiachi(){
        final RequestQueue requestQueue=Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest=new StringRequest(Request.Method.POST, Server.capnhapdiachi, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> param=new HashMap<String, String>();
                param.put("MaTaiKhoan",String.valueOf(DangNhapActivity.id));
                param.put("diachi",edtdc.getText().toString().trim());
                return param;
            }
        };
        requestQueue.add(stringRequest);



    }

    private void Anhxa() {
        lvgiohang=(ListView)findViewById(R.id.listviewgiohang);
        txttongtien=(TextView)findViewById(R.id.textviewgiatrigiohang);
        txtthongbao=(TextView)findViewById(R.id.textviewthongbao);
        btnthanhtoan=(Button)findViewById(R.id.buttonthanhtoanngiohang);
        btntieptucmua=(Button)findViewById(R.id.buttontieptucmuahang);
        toolbargiohang=(Toolbar)findViewById(R.id.toolbargiohang);
        adapter=new GioHangAdapter(GioHang.this,MainActivity.manggiohang);
        lvgiohang.setAdapter(adapter);

    }
}
